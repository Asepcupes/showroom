@extends('clients.master-dashboard')
@section('title', 'Tambah Produk')
@section('product', 'active')
@section('dashboard')
    <section class="content-main">
        <div class="row">
            <div class="col-12">
                <div class="content-header">
                    <h2 class="content-title">Add New Product</h2>
                    <div>
                        <button class="btn btn-light rounded font-sm mr-5 text-body hover-up">Save to draft</button>
                        <button class="btn btn-md rounded font-sm hover-up">Publich</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Basic</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-4">
                                <label class="form-label" for="product_name">Product title</label>
                                <input class="form-control" id="product_name" type="text" placeholder="Type here">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Full description</label>
                                <textarea class="form-control" placeholder="Type here" rows="4"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label class="form-label">Harga</label>
                                        <div class="row gx-2"></div>
                                        <input class="form-control" placeholder="$" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label class="form-label">Discount</label>
                                        <input class="form-control" type="text" id="myPercent" oninput="convertToDecimal(this)" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- <div class="card mb-4">
                    <div class="card-header">
                        <h4>Shipping</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label class="form-label" for="product_name">Width</label>
                                        <input class="form-control" id="product_name" type="text" placeholder="inch">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label class="form-label" for="product_name">Height</label>
                                        <input class="form-control" id="product_name" type="text" placeholder="inch">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="product_name">Weight</label>
                                    <input class="form-control" id="product_name" type="text" placeholder="gam">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label" for="product_name">Shipping fees</label>
                                    <input class="form-control" id="product_name" type="text" placeholder="$">
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Media</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-upload"><img src="{{ asset('ecom_dashboard/imgs/theme/upload.svg') }}"
                                alt="">
                            <input class="form-control" type="file">
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Organization</h4>
                    </div>
                    <div class="card-body">
                        <div class="row gx-2">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Category</label>
                                <select class="form-select">
                                    <option> Automobiles</option>
                                    <option> Home items</option>
                                    <option> Electronics</option>
                                    <option> Smartphones</option>
                                    <option> Sport items</option>
                                    <option> Baby and Tous</option>
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Sub-category</label>
                                <select class="form-select">
                                    <option> Nissan</option>
                                    <option> Honda</option>
                                    <option> Mercedes</option>
                                    <option> Chevrolet</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="product_name">Tag</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('importjs')
    <script>
function convertToDecimal(inputElement) {
  var inputValue = inputElement.value.trim();

  // Remove any percentage sign (%) if present
  if (inputValue.endsWith("%")) {
    inputValue = inputValue.slice(0, -1);
  }

  // Convert the input to a decimal (e.g., 50% to 0.5)
  var decimalValue = parseFloat(inputValue) / 100;

  if (!isNaN(decimalValue) && decimalValue >= 0 && decimalValue <= 1) {
    // Update the input field with the decimal value
    inputElement.value = (decimalValue * 100).toFixed(2) + "%";
  } else {
    // Handle invalid input, e.g., display an error message
  }
}
    </script>
@endpush
