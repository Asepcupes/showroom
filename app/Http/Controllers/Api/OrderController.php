<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\MasterAccount;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Xendit\Configuration;
use Xendit\PaymentRequest\PaymentRequestApi;
use Xendit\PaymentRequest\PaymentRequestParameters;
use Xendit\QRCode;
use Xendit\Retail;
use Xendit\VirtualAccounts;
use Xendit\Xendit;

// use Xendit\Xendit;


class OrderController extends Controller
{

    public function createPaymentRequest($channelType, $channelCode, $amount, $paymentIdentifier, $paymentDue, User $user)
    {
        Xendit::setApiKey(env('XENDIT_KEY'));

        $result = null;
        // dd($amount);

        if ($channelType == 'VIRTUAL_ACCOUNT') {
            $result = VirtualAccounts::create([
                'external_id' => $paymentIdentifier . strval(time()),
                'bank_code' => $channelCode,
                'is_closed' => true,
                'name' => $user->name,
                'expected_amount' => $amount,
                'expiration_date' => $paymentDue,
            ]);
        } else if ($channelType == 'QR_CODE') {
            $result = QRCode::create([
                'api_version' => '2022-07-31',
                'reference_id' => $paymentIdentifier . strval(time()),
                'type' => 'DYNAMIC',
                'webhook-url' => 'https://redirect.me',
                'amount' => $amount,
                'expires_at' => $paymentDue,
                'currency' => 'IDR',
            ]);
        } else if ($channelType == 'OVER_THE_COUNTER') {
            $result = Retail::create([
                'external_id' => $paymentIdentifier . strval(time()),
                'retail_outlet_name' => $channelCode,
                'name' => $user->name,
                'expected_amount' => $amount,
                'expiration_date' => $paymentDue,
            ]);
        }


        return $result;
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return ResponseAPI('Product berhasil dihapus.');
    }


    public function preCheckEarly(Request $request)
    {
        $user = auth()->guard('api-client')->user();
        // VirtualAccount::setters
        $request->validate([
            'order_items' => 'required',
        ]);

        $products = [];
        $total = 0;
        $totalWithoutDiscount = 0;
        $countedPromoProduct = 0;
        $countedAmountPromo = 0;
        $weight = 0;

        $orderItems = json_decode($request->order_items, true);

        foreach ($orderItems as $order_item) {
            $product_id = $order_item['product_id'];
            $product = \App\Models\Product::find($order_item['product_id']);
            if ($product == null) {
                $product = Product::withTrashed()->where('id', $product_id)->first();
                if ($product == null)
                    return ResponseAPI("Maaf produk dengan id tidak ditemukan.", 404);
                else
                    return ResponseAPI("Maaf kami sudah tidak menjual produk " . $product->name . " lagi.", 404);
            }

            if ($product->stock < $order_item['qty']) {
                return ResponseAPI('Stock Produk ' . $product->name . " tidak cukup. stok yang tersisa sebanyak " . $product->stock, 400);
            }

            if ($product->discount > 0) {
                // minusing the product price with discount as percentage
                $thePromoAmount = ($product->price * $product->discount / 100);
                $resultItemPriceAfterDiscount = $product->price - $thePromoAmount;
                $countedPromoProduct++;
                $countedAmountPromo += $thePromoAmount * $order_item['qty'];

                $total += $resultItemPriceAfterDiscount * $order_item['qty'];
                $totalWithoutDiscount += $product->price * $order_item['qty'];
            } else {
                $total += $product->price * $order_item['qty'];
                $totalWithoutDiscount += $product->price * $order_item['qty'];
            }

            $weight += $product->weight * $order_item['qty'];
            array_push($products, $product);
        }

        $data['total'] = $total;
        $data['total_without_discount'] = $totalWithoutDiscount;
        $data['counted_promo_product'] = $countedPromoProduct;
        $data['counted_amount_promo'] = $countedAmountPromo;
        // $aa = $this->checkShippingPrice();
        $data['products'] = $products;

        return ResponseAPI($data);
    }

    public function preCheck(Request $request)
    {
        $user = auth()->guard('api-client')->user();
        // VirtualAccount::setters
        $request->validate([
            'order_items' => 'required',
            'address_id' => 'required',
        ]);

        $addressBuyer = Address::findOrFail($request->address_id);
        $seller = \App\Models\User::find($request->seller_id);
        // dd($seller);
        $sellerAddress = Address::where('user_id', $seller->id)->where('main', true)->firstOrFail();

        $products = [];
        $total = 0;
        $totalWithoutDiscount = 0;
        $countedPromoProduct = 0;
        $countedAmountPromo = 0;
        $weight = 0;

        $orderItems = json_decode($request->order_items, true);
        // dd($orderItems);
        foreach ($orderItems as $order_item) {
            $product_id = $order_item['product_id'];
            $product = \App\Models\Product::find($order_item['product_id']);
            if ($product == null) {
                $product = Product::withTrashed()->where('id', $product_id)->first();
                if ($product == null)
                    return ResponseAPI("Maaf produk dengan id tidak ditemukan.", 404);
                else
                    return ResponseAPI("Maaf kami sudah tidak menjual produk " . $product->name . " lagi.", 404);
            }

            if ($product->stock < $order_item['qty']) {
                return ResponseAPI('Stock Produk ' . $product->name . " tidak cukup. stok yang tersisa sebanyak " . $product->stock, 400);
            }

            if ($product->discount > 0) {
                // minusing the product price with discount as percentage
                $thePromoAmount = ($product->price * $product->discount / 100);
                $resultItemPriceAfterDiscount = $product->price - $thePromoAmount;
                $countedPromoProduct++;
                $countedAmountPromo += ($thePromoAmount * $order_item['qty']);

                $total += ($resultItemPriceAfterDiscount * $order_item['qty']);
                $totalWithoutDiscount += ($product->price * $order_item['qty']);
            } else {
                $itemTotal = ($product->price * $order_item['qty']);
                $total += $itemTotal;
                $totalWithoutDiscount += $itemTotal;
            }

            $weight += ($product->weight * $order_item['qty']);
            array_push($products, $product);
        }


        $data['total'] = $total;
        $data['total_without_discount'] = $totalWithoutDiscount;
        $data['counted_promo_product'] = $countedPromoProduct;
        $data['counted_amount_promo'] = $countedAmountPromo;
        $data['weight'] = $weight;
        Log::info('checkShippingPrice called with parameters:', [
            'origin_id' => $addressBuyer->ro_subdistrict_id,
            'destination_id' => $sellerAddress->ro_city_id,
            'weight' => $weight,
        ]);

        // $weight = -2;
        // $deliveryServicesInfo = checkShippingPrice($addressBuyer->ro_subdistrict_id, $sellerAddress->ro_city_id, $weight);
        $dataRequest = [
            'origin_id' => $addressBuyer->ro_subdistrict_id,
            'destination_id' => $sellerAddress->ro_city_id,
            'weight' => $weight,
        ];
        $requestForShippingPrice = new Request();
        $requestForShippingPrice->merge($dataRequest);
        $deliveryServicesInfo = $this->lypsisCheckShippingPrice($requestForShippingPrice);
        $data['delivery_services_info'] = $deliveryServicesInfo;
        // $data['delivery_services_info'] = checkShippingPrice($addressBuyer->ro_subdistrict_id, $sellerAddress->ro_city_id, $weight);
        // $aa = $this->checkShippingPrice();
        $data['products'] = $products;

        return ResponseAPI($data);
    }

    public function dummyDelivery(Request $request)
    {
        // return $request->type;
        if ($request->type == 'a') {
            $dataRequest = [
                'origin_id' => 18,
                'destination_id' => 16,
                'weight' => 0,
            ];
            $requestForShippingPrice = new Request();
            $requestForShippingPrice->merge($dataRequest);
            $deliveryServicesInfo = $this->lypsisCheckShippingPrice($requestForShippingPrice);
            return ResponseAPI($deliveryServicesInfo);
            // $this->lypsisCheckShippingPrice();
        } else if ($request->type == 'b') {
            $dataRequest = [
                'origin_id' => 18,
                'destination_id' => 0,
                'weight' => 100,
            ];
            $requestForShippingPrice = new Request();
            $requestForShippingPrice->merge($dataRequest);
            $deliveryServicesInfo = $this->lypsisCheckShippingPrice($requestForShippingPrice);
            return ResponseAPI($deliveryServicesInfo);
            // $this->lypsisCheckShippingPrice();
        }
    }

    public function lypsisCheckShippingPrice(Request $request)
    {
        $request->validate([
            'origin_id' => 'required|numeric',
            'destination_id' => 'required|numeric',
            'weight' => 'required|numeric|min:1',
            'earlier_mode' => 'boolean|nullable',
        ]);

        // dd($request->all());

        $originId = $request->input('origin_id');
        $destinationId = $request->input('destination_id');
        $weight = $request->input('weight');
        $earlierMode = $request->earlier_mode ?? false;

        $client = new Client();
        // $city = 365; // pontianak
        $originType = 'city';
        // $destination = 55; // bekasi
        $destinationType = 'subdistrict';

        // $destination = 224; // Lampung Selatan
        // $originType = 'city';

        $client = new Client();
        // $city = 365; // pontianak
        $originType = 'city';
        // $destination = 55; // bekasi
        $destinationType = 'subdistrict';

        // checker originId, destinationId and weight if null or empty return responseApi error
        // if ($originId == null || $destinationId == null || $weight <= 0) {
        //     return ResponseAPI('Origin, destination and weight cannot be empty', false);
        // }

        // $destination = 224; // Lampung Selatan
        // $originType = 'city';

        try {
            // Log::info("Catched Exception 0");

            $res = $client->request('POST', "https://pro.rajaongkir.com/api/cost", [
                'headers' => [
                    'key' => env('RO_KEY')
                ],
                'json' => [
                    'origin' => $originId,
                    'originType' => $originType,
                    'destination' => $destinationId,
                    'destinationType' => $destinationType,
                    'weight' => $weight,
                    'courier' => env('RO_SERVICES'),
                ],
                'timeout' => 15,
            ]);
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $pattern = '/{.*}/';
            preg_match($pattern, $message, $matches);
            if (empty($matches)) {
                $message = $e->getMessage();
                $code = $e->getCode();

                throw new Exception($message, $code);
                // throw new Exception("Error getting shipping cost: no response from RajaOngkir API");
            }

            $body = json_decode($matches[0], true);
            $errorCode = $body['rajaongkir']['status']['code'];
            $errorDescription = $body['rajaongkir']['status']['description'];
            throw new Exception("Error getting shipping cost: $errorCode $errorDescription", $errorCode);
        }


        // $res = $client->request('POST', "https://pro.rajaongkir.com/api/cost", [
        //     'headers' => [
        //         'key' => env('RO_KEY')
        //     ],
        //     'json' => [
        //         'origin' => $originId,
        //         'originType' => $originType,
        //         'destination' => $destinationId,
        //         'destinationType' => $destinationType,
        //         'weight' => $weight,
        //         'courier' => env('RO_SERVICES'),
        //     ],
        //     'timeout' => 15,
        // ]);


        $rajaOngkirResponse = json_decode($res->getBody()->getContents());
        // dd($rajaOngkirResponse);
        // return $rajaOngkirResponse;
        $shippingCost = $rajaOngkirResponse->rajaongkir;
        $data['origin_details'] = $shippingCost;
        // $data['origin_details'] = $shippingCost->origin_details;
        $data['destination_details'] = $shippingCost->destination_details;
        if ($earlierMode == false) {
            $data['results'] = $shippingCost->results;
        } else {
            $dataEarlier = null;
            if (isset($shippingCost->results[0]->costs[1])) {
                $dataEarlier = $shippingCost->results[0]->costs[1];
            } else {
                $dataEarlier = $shippingCost->results[0]->costs[0];
            }

            $data['results_earlier'] = $dataEarlier;
        }
        // $shippingCost->results[0]->costs[0]->cost[0]->value;
        return $data;
        // return  $shippingCost->results;
    }

    public function precheckWithDelivery(Request $request)
    {
        $request->validate([
            'order_items' => 'required',
            'address_id' => 'required',
            'delivery_cost' => 'required|numeric',
            'delivery_code' => 'required',
            'delivery_name' => 'required',
            'delivery_service' => 'required',
            'delivery_estimation_day' => 'required',
        ]);

        $products = [];
        $total = 0;
        $totalWithoutDiscount = 0;
        $countedPromoProduct = 0;
        $countedAmountPromo = 0;
        $deliveryCost = (int)$request->delivery_cost;


        $orderItems = json_decode($request->order_items, true);

        foreach ($orderItems as $order_item) {
            $product_id = $order_item['product_id'];
            $product = \App\Models\Product::find($order_item['product_id']);
            if ($product == null) {
                $product = Product::withTrashed()->where('id', $product_id)->first();
                return ResponseAPI("Maaf kami sudah tidak menjual produk " . $product->name . " lagi.", false);
            }

            if ($product->stock < $order_item['qty']) {
                return ResponseAPI('Stock Produk ' . $product->name . " tidak cukup. stok yang tersisa sebanyak " . $product->stock, 400);
            }

            if ($product->discount > 0) {
                // minusing the product price with discount as percentage
                $thePromoAmount = ($product->price * $product->discount / 100);
                $resultItemPriceAfterDiscount = $product->price - $thePromoAmount;
                $countedPromoProduct++;
                $countedAmountPromo += $thePromoAmount * $order_item['qty'];

                $total += $resultItemPriceAfterDiscount * $order_item['qty'];
                $totalWithoutDiscount += $product->price * $order_item['qty'];
            } else {
                $total += $product->price * $order_item['qty'];
                $totalWithoutDiscount += $product->price * $order_item['qty'];
            }
            array_push($products, $product);
        }

        // create $identifier on Order::class i had getNextId() 


        // $type = 'QRIS';
        // $type = 'VirtualAccount';
        $serviceFee = 0;
        $type = 'Retail';
        if ($type == 'VirtualAccount') {
            $serviceFee = 4500;
        } elseif ($type == 'QRIS') {
            // $serviceFee = floor($total * 0.00699);
            $serviceFee = floor($total * 0.007);
        } elseif ($type == 'Retail') {
            $serviceFee = 5550;
        }

        $data['subtotal'] = $total;
        $additionFee = $deliveryCost + $serviceFee;
        $total += $additionFee;
        $totalWithoutDiscount += $additionFee;

        $data['delivery_cost'] = $deliveryCost;
        $data['payment_service_fee'] = $serviceFee;
        $data['total'] = $total;
        $data['total_without_discount'] = $totalWithoutDiscount;
        $data['counted_promo_product'] = $countedPromoProduct;
        $data['counted_amount_promo'] = $countedAmountPromo;
        $data['products'] = $products;
        $data['delivery_code'] = $request->input('delivery_code');
        $data['delivery_name'] = $request->input('delivery_name');
        $data['delivery_service'] = $request->input('delivery_service');
        $data['delivery_estimation_day'] = $request->input('delivery_estimation_day');

        return ResponseAPI($data);
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'order_items' => 'required',
            'address_id' => 'required',
            'delivery_cost' => 'required|numeric',
            'delivery_code' => 'required',
            'delivery_name' => 'required',
            'delivery_service' => 'required',
            'master_account_id' => 'required',
        ]);

        $user = auth()->guard('api-client')->user();
        DB::beginTransaction();

        $products = [];
        $total = 0;
        $totalWithoutDiscount = 0;
        $countedPromoProduct = 0;
        $countedAmountPromo = 0;
        $deliveryCost = (int)$request->delivery_cost;
        // $paymentDue = now()->addDays(1)->format('Y-m-d H:i:s');
        // $paymentDue = now()->addHours(24)->format('Y-m-d H:i:s');
        $paymentDue = now()->addHours(24);
        $countOrderToday = DB::table('orders')->whereDate('created_at', now())->count();
        $identifier = str_pad(now()->day, 2, '0', STR_PAD_LEFT) . strtoupper(now()->format("M")) . now()->format('y') . 'ORD' . str_pad(($countOrderToday + 1), 3, '0', STR_PAD_LEFT) . env('XND_ID') . time();


        $orderItems = json_decode($request->order_items, true);

        $order = new Order();

        $order->payment_identifier = $identifier;
        $order->user_id = $user->id;
        $order->save();

        foreach ($orderItems as $order_item) {
            $product_id = $order_item['product_id'];
            $product = \App\Models\Product::find($order_item['product_id']);
            $itemTotal = 0;

            if ($product == null) {
                $product = Product::withTrashed()->where('id', $product_id)->first();
                DB::rollBack();
                return ResponseAPI("Maaf kami sudah tidak menjual produk " . $product->name . " lagi.", false);
            }

            if ($product->stock < $order_item['qty']) {
                DB::rollBack();
                return ResponseAPI('Stock Produk ' . $product->name . " tidak cukup. stok yang tersisa sebanyak " . $product->stock, 400);
            }

            if ($product->discount > 0) {
                // minusing the product price with discount as percentage
                $thePromoAmount = ($product->price * $product->discount / 100);
                $resultItemPriceAfterDiscount = $product->price - $thePromoAmount;
                $countedPromoProduct++;
                $countedAmountPromo += $thePromoAmount * $order_item['qty'];

                $itemTotal = $resultItemPriceAfterDiscount * $order_item['qty'];
                $total += $itemTotal;
                $totalWithoutDiscount += $product->price * $order_item['qty'];
            } else {
                $itemTotal = $product->price * $order_item['qty'];
                $total += $itemTotal;
                $totalWithoutDiscount += $product->price * $order_item['qty'];
            }
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $product_id;
            $orderItem->quantity = $order_item['qty'];
            $orderItem->subtotal = $product->price * $order_item['qty'];
            $orderItem->item_total = $itemTotal;
            $orderItem->price = $product->price;
            $orderItem->note = $order_item['note'];
            // $orderItem->fee_seller = $product->fee_seller;
            // $orderItem->fee_buyer = $product->fee_buyer;
            $orderItem->save();

            array_push($products, $product);
        }

        // create $identifier on Order::class i had getNextId() 


        // $type = 'QRIS';
        // $type = 'VirtualAccount';
        $data['subtotal'] = $total;

        $serviceFee = 0;
        $type = 'Retail';
        if ($type == 'VirtualAccount') {
            $serviceFee = 4500;
            $additionFee = $deliveryCost + $serviceFee;

            $total += $additionFee;
            $totalWithoutDiscount += $additionFee;
        } elseif ($type == 'QRIS') {
            // $serviceFee = floor($total * 0.00699);
            $serviceFee = floor($total * 0.007);
        } elseif ($type == 'Retail') {
            $serviceFee = 5550;
        }


        $masterAccount = MasterAccount::findOrFail($request->master_account_id);

        $channelType = lypsisConvertPaymentChannelType($masterAccount->type);
        $channelCode = $channelType == 'QR_CODE' ? "DYNAMIC" : $masterAccount->provider_name;

        $dataPaymentCreated = $this->createPaymentRequest($channelType, $channelCode, $total, $identifier, $paymentDue, $user);

        // dd($dataPaymentCreated);
        // return ResponseAPI($dataPaymentCreated);


        $order->discount_product = $countedAmountPromo;
        $order->payment_status = Order::PAYMENT_PAID;
        $order->status = Order::PENDING;
        $order->address_id = $request->address_id;
        $order->delivery_cost = $deliveryCost;
        $order->service_fee = $serviceFee;
        $order->delivery_estimation_day = $request->delivery_estimation_day;
        $order->delivery_service_code = $request->delivery_code;
        $order->delivery_service_name = $request->delivery_name;
        $order->delivery_service_kind = $request->delivery_service;
        if ($countedAmountPromo > 0) {
            $order->total = $totalWithoutDiscount;
            $order->total_final = $total;
        } else {
            $order->total = $total;
        }

        // $order->market_fee_buyer = '';
        // $order->market_fee_seller = '';
        $order->master_account_id = $request->master_account_id;
        $order->payment_channel = $masterAccount->provider_name;
        $order->payment_due = $paymentDue;

        if ($channelType == 'VIRTUAL_ACCOUNT') {
            $order->va_number = $dataPaymentCreated['account_number'];
        } else if ($channelType == 'QR_CODE') {
            $order->qr_id = $dataPaymentCreated['id'];
            $order->qr_string = $dataPaymentCreated['qr_string'];
        } else if ($channelType == 'OVER_THE_COUNTER') {
            $order->outlet_payment_code = $dataPaymentCreated['payment_code'];
        }

        $order->save();

        // * Remember To Save The MasterAccountId

        $data['delivery_cost'] = $deliveryCost;
        $data['payment_service_fee'] = $serviceFee;
        $data['total'] = $total;
        $data['total_without_discount'] = $totalWithoutDiscount;
        $data['counted_promo_product'] = $countedPromoProduct;
        $data['counted_amount_promo'] = $countedAmountPromo;
        $data['order'] = $order;
        // $data['products'] = $products;
        DB::commit();

        return ResponseAPI($data);
    }




    public function waybillCheck(Request $request)
    {
        $request->validate([
            'delivery_receipt_number' => 'required',
            'delivery_service' => 'required',
        ]);

        $client = new Client();
        $res = $client->request('POST', 'https://pro.rajaongkir.com/api/waybill', [
            'headers' => [
                'key'     => '5f96f4b2ff5b4de345165466b71d002c',
            ],
            'form_params' => [
                'waybill' => $request->delivery_receipt_number,
                'courier' => $request->delivery_service,
            ]
        ]);

        $rajaOngkirResponse = json_decode($res->getBody()->getContents())->rajaongkir->result;
        return ResponseAPI($rajaOngkirResponse);
    }
}
