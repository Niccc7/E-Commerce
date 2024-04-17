@extends('Template.Layouts.second')
@section('content-product')
    <style>
        html,
        body {
            height: 100vh;
            margin: 0; 
            padding: 0;
        }
    </style>
    <div class="row">
        @if (session('success'))
            <div class="mt-5 alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="mt-3 mb-4 text-center">All Products</h1>
        @foreach ($products as $product)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="{{ asset('storage/foto-product') }}/{{ $product->image }}" class="object-fit-cover w-100 h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <a href="{{ route('product.detail', ['slug' => $product->slug]) }}" class="btn btn-primary">Read
                            More</a>
                        <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-outline-danger"><i
                                class="bi bi-cart"></i> Add to cart</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-end">
        {{ $products->links() }}
    </div>
@endsection

@section('footer')
    <footer style="margin-top:0;">
        <style>
            .content-bot {
                color: #f2f2f2;
                display: flex;
                background-color: #668A89;
                width: 100%;
                position: fixed; /* Fix the footer at the bottom of the viewport */
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 1030; /* Set a higher z-index than the content to ensure the footer stays on top */
            }
            .footer-copyright {
                padding: 1rem 0;
                font-size: 16px;
                text-align: center;
            }
        </style>
        <div class="content-bot">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-copyright">
                            <p class="mb-0">&copy; Copyright Saudagar 2024. All right reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection