@extends('Template.Layouts.second')
@section('content-product')
    <style>
        html,
        body {
            height: 100vh;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
        }

        .container-product {
            margin-top: 25px;
            margin-bottom: 50px;
            margin-left: 200px;
            margin-right: 200px;
            display: flex;
            flex: 1;
        }

        .right-box {
            width: 50%;
            border: 1px solid;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
        }

        .main-image-box {
            padding: 20px;
            width: 100%;
            height: 100%;
            display: flex;
            border: 0;
            align-items: center;
            justify-content: center;
        }

        .main-image {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }

        .details-box {
            width: 50%;
            padding-left: 50px;
            padding-right: 50px;
            padding-bottom: 50px;
            box-sizing: border-box;
        } 

        button {
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            background-color: green;
            color: white;
            margin-top: 14px;
            cursor: pointer;
        }

        button:hover {
            background-color: navy;
        }
    </style>
    <a class="btn btn-primary mt-4" href="{{ route('product') }}">Back To Products</a>
    <div class="container-product">
        <div class="right-box">
            <div class="main-image-box">
                <img class="main-image" src="{{ asset('storage/foto-product') }}/{{ $product->image }}">
            </div>
        </div>
        <div class="details-box">
            <h1>{{ $product->name }}</h1>
            @if ($product->quantity > 0)
                <p>Tersedia</p>
            @else
                <p>Tidak Tersedia</p>
            @endif
            <h2 id="price">Rp {{ number_format($product->price, 0, ',', '.') }}</h2>
            <h4 class="mt-3">Description</h4>
            <p>{{ $product->description }}</p>
            <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-outline-danger"><i class="bi bi-cart"></i> Add
                to cart</a>
        </div>
    </div>
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
            <p class="text-center mt-3" style="font-size: 16px; padding: 0; padding-left: 39.5%; margin-bottom: 20px;">
                © Copyright Saudagar 2024. All right reserved.
            </p>
        </div>
    </footer>
@endsection
