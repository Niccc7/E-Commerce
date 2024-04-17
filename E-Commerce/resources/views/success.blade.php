@extends('Template.Layouts.second')
@section('content-product')
    <style>
        html,
        body {
            height: 100vh;
            margin: 0;
            padding: 0;
        }
        .pesanan-sukses {
            height: calc(100vh - 100px); /* Subtract the height of the footer from the height of the viewport */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
    <div class="pesanan-sukses">
        <div class="container">
          <div class="row justify-content-center mt-3">
            <div class="col-md-6 text-center">
              <img class="img-fluid" src="{{ asset('img/request-submit-success.png') }}" width="200" />
              <h2><strong>Success!!</strong></h2>
              <h4>Pesanan Anda Berhasil Di Pesan <br> Terima kasih Telah Berbelanja</h4>
            </div>
          </div>
        </div>
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
            }
        </style>
        <div class="content-bot mt-5">
            <p class="text-center mt-3" style="font-size: 16px; padding: 0; padding-left: 39.5%; margin-bottom: 20px;">©
                Copyright Saudagar 2024. All right reserved.</p>
        </div>
    </footer>
@endsection
