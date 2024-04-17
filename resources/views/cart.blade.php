@extends('Template.Layouts.second')

@section('content-product')
    <style>
        :root {
            --pink: #00fff0;
        }

        html,
        body {
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        * {
            box-sizing: border-box;
            font-family: sans-serif, rubik;
        }

        .contanier {
            width: 100%;
            height: 100vh;
            padding: 0 5px 0;
            display: flex;
            flex-direction: column;
        }

        .cart {
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            top: 0;
            z-index: 1000;
        }

        .cart-header {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            font-weight: bolder;
            margin-bottom: 10px;
        }

        .cart-table {
            flex-grow: 1;
            overflow: auto;
        }

        .cart-table table {
            width: 100%;
            table-layout: fixed;
        }

        .cart-table th {
            background: #DaDaDa;
            width: 100px;
            padding: 10px;
            text-align: center;
        }

        .cart-table td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .cart-table .actions {
            text-align: center;
        }

        .cart-table .btn-danger {
            margin-right: 10px;
        }

        .cart-table input[type="number"] {
            width: 50px;
            align-items: center;
        }

        .cart-table .subtotal {
            font-weight: bold;
        }

        .cart-footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            padding: 10px;
            background-color: #f5f5f5;
        }

        .cart-footer a {
            margin-right: 10px;
        }

        .cart-footer .btn-checkout {
            margin-left: auto;
        }
    </style>
    <div class="container">
        <div class="cart mt-3">
            <div class="cart-header">Keranjang Belanja</div>
        </div>
        <div class="cart-table">
            <table class="table table-bordered border-secondary">
                <thead>
                    <tr>
                        <th style="width: 40px; padding: 20px;" class="text-center">Image</th>
                        <th style="width: 40px; padding: 20px;" class="text-center">Product Name</th>
                        <th style="width: 40px; padding: 20px;" class="text-center">Price</th>
                        <th style="width: 40px; padding: 20px;" class="text-center">Quantity</th>
                        <th style="width: 40px; padding: 20px;"class="text-center">SubTotal</th>
                        <th style="width: 40px; padding: 20px;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @if (session('cart'))
                        @foreach (session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <tr data-id="{{ $id }}">
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-3 hidden-xs">
                                            <img src="{{ asset('storage/foto-product') }}/{{ $details['image'] }}" width="70px" height="70px">
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Product">
                                        <div class="col-sm-9">
                                            <h4 class="text-center">{{ $details['name'] }}</h4>
                                        </div>
                                </td>
                                <td data-th="Price">Rp {{ $details['price'] }}</td>
                                <td data-th="Quantity">
                                    <input type="number" value="{{ $details['quantity'] }}"
                                        class="form-control quantity cart_update">
                                </td>
                                <td data-th="Subtotal">Rp {{ $details['price'] * $details['quantity'] }}
                                </td>
                                <td class="actions">
                                    <button class="btn btn-danger btn-sm delete-product"><i class="fa fa-trash-o"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6" style="text-align:right;">
                            <h3><strong>Total Rp{{ $total }}</strong></h3>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="cart-footer">
            <a href="{{ route('product') }}" class="btn btn-danger">
                <i class="fa fa-arrow-left"></i> Continue Shopping
            </a>
            <button type="button" class="btn btn-primary btn-checkout" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Checkout
            </button>
        </div>
    </div> 
@endsection
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Checkout</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>
                    Name: {{ $user->name }}
                </h6>
                <h6>
                    Phone: {{ $user->phone ?? '-' }}
                </h6>
                <h6>
                    Address: {{ $user->address ?? '-' }}
                </h6>
                <br>

                <form class="mt-3" action="{{ route('checkout.cart') }}" id="checkoutForm" method="POST">
                    @csrf
                    <h3 style="font-size: 20px;">Cart Totals</h3>
                    <h6>SubTotal:
                        <span>
                            Rp {{ $total }}
                            <input type="hidden" name="subtotal" value="{{ $total }}" readonly width="50px">
                        </span>
                    </h6>
                    <h6>Tax:
                        <span id="tax">
                            10 %
                        </span>
                        <input type="hidden" name="tax" id="taxInput" readonly>
                    </h6>
                    <h6>Total:
                        <span id="total">   
                            Rp {{ $total }}
                        </span>
                        <input type="hidden" name="total" id="totalInput" readonly>
                    </h6>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Order Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function() {
            var subtotal = parseFloat({{ $total }});
            var tax = 0.10; // set tax rate to 10%
            var total = subtotal + (subtotal * tax);

            $('#taxInput').val(tax.toFixed(2));
            $('#totalInput').val(total.toFixed(0));
            $('#total').text('Rp ' + total.toFixed(0));
        });

        $(".cart_update").change(function(e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ route('update.cart.product') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });
        
        $(function() {
            $(".delete-product").click(function(e) {
                e.preventDefault();

                var ele = $(this);

                Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    url: '{{ route('delete.cart.product') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        Swal.fire({
                        title: "Deleted!",
                        text: "Your product has been removed from the cart.",
                        icon: "success"
                        }).then(() => {
                        setTimeout(() => {
                            window.location.reload();
                        }, 300);
                        });
                    }
                    });
                }
                });
            });
        });
    </script>
@endsection
@section('footer')
    <footer style="position: absolute; bottom: 0; width: 100%">
        <style>
            .content-bot {
                color: #f2f2f2;
                display: flex;
                background-color: #668A89;
                width: 100%;
            }
        </style>
        <div class="content-bot mt-3">
            <p class="text-center mt-3" style="font-size: 16px; padding: 0; padding-left: 39.5%; margin-bottom: 20px;">©
                Copyright Saudagar 2024. All right reserved.
            </p>
        </div>
    </footer>
@endsection
