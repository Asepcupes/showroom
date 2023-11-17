@extends('clients.master-dashboard')
@section('title', 'Detail Pembayaran')
@section('myOrder', 'active')
@section('dashboard')
    <section class="content-main">
        <div class="alert alert-success" role=alert style=display:none id=mydiv2>
            Berhasil disalin.
        </div>
        <div class="content-header">
            <div>
                <h2 class="content-title">Detail Pembayaran</h2>
            </div>
            <div> <a href="{{ route('dashboard.myOrder') }}" class="btn btn-xs">
                    Kembali ke Pesanan
                </a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <header class="card-header2">
                            <div class="row align-items-center">
                                <div class="col-lg-12 mb-lg-0 mb-15">
                                    <span><i class="material-icons md-calendar_today"></i>
                                        <b>Batas Pembayaran : {{ $order->due }} WIB
                                        </b>
                                    </span>
                                    <br>
                                    <small class="text-muted">Nomor Resi : {{ $order->payment_identifier ?? '' }}</small>

                                    <p class="mt-15"><span>Status:</span>
                                        <span class="badge rounded-pill alert-warning alert-link px-3 py-2">Menunggu
                                            Pembayaran</span>
                                    </p>
                                </div>
                            </div>
                        </header>
                        <!-- card-header end//-->

                        <h5 class="mt-5 mb-1">Pembayaran</h5>
                        <div class="d-flex flex-row gap-3">
                            <div class="w-67">
                                <p class="line-1 text-start font-md fw-700">
                                    {{ $order->master_account?->provider_name ?? '' }}</p>
                            </div>
                            <div class="w-33 text-end"><img width="30px" src="{{ $order->master_account?->image ?? '' }}"
                                    alt="{{ $order->master_account?->provider_name ?? '' }}" srcset=""></div>
                        </div>
                        @if (isset($order->master_account) && $order->master_account?->type == 'Retail-Outlet')
                            <div class="d-flex flex-row mt-2 mb-3 align-items-center justify-content-between">
                                <div class="d-flex flex-column">
                                    <p class="textGrey2 mb-0 fw-500 virtual-account fs-15">Kode Pembayaran</p>
                                    <p class="textPrimary mb-1 fw-700" id=number-virtual-account>
                                        {{ $order->outlet_payment_code }}</p>
                                </div>
                                <p class="textSecondary mb-1 fw-600 textCopy" role=button>Salin</p>
                            </div>
                        @elseif (isset($order->master_account) && $order->master_account?->type == 'Virtual-Account')
                            <div class="d-flex flex-row mt-2 mb-3 align-items-center justify-content-between">
                                <div class="d-flex flex-column">
                                    <p class="textGrey2 mb-0 fw-500 virtual-account fs-15">Nomor Virtual Account</p>
                                    <p class="textPrimary mb-1 fw-700" id=number-virtual-account>{{ $order->va_number }}
                                    </p>
                                </div>
                                <p class="textSecondary mb-1 fw-600 textCopy" role=button>Salin</p>
                            </div>
                        @elseif (isset($order->master_account) && $order->master_account?->type == 'E-Wallet')
                        @endif
                        @if (isset($order->qr_string))
                            <div class="py-4 text-center">
                                {!! QrCode::size(300)->generate($order->qr_string) !!}
                            </div>
                        @endif
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, veritatis at.
                            Dolore facilis repellat numquam cum, id, iste sint libero odio atque a quam ducimus cumque quis
                            enim reiciendis repellendus?</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('importjs')
    <script type="text/javascript">
        $(".textCopy").click(function(e) {
            e.preventDefault();
            copyToClipboard($("#number-virtual-account"));
            $("#mydiv2").css("display", "block");
            setTimeout((function() {
                $("#mydiv2").fadeOut("fast")
            }), 2000);
        })

        function copyToClipboard(a) {
            var e = $("<input>");
            $("body").append(e), e.val($(a).text()).select();
            document.execCommand("copy");
            e.remove();
        }
    </script>
@endpush