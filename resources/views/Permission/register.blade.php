@extends('Template.Layouts.main')
@section('content')
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Gill Sans', 'Gill Sans MT', 
        Calibri, 'Trebuchet MS', sans-serif;
    }
    .container {
        margin-top: 100px;
        width: 100%;
        height: 100%;
        display: flex;
        max-width: 1600px;
        background: #f4f4f4;
        border-radius: 15px;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: 100vh;
        background-color: #f4f4f4;
    }

    .register {
        width: 400px;
        margin-left: 80px;
    }

    form {
    width: 600px;
    margin: 60px auto;
    }

    h1 {
        margin: 20px;
        margin-top: 20%;
        text-align: center;
        font-weight: bolder;
        text-transform: uppercase;
    }

    hr {
        margin-left: 11px;
        margin-right: -11px;
        border-top: 2px solid #2f1c1c;
    }

    p {
        text-align: center;
        margin: 10px;
    }

    .right img {
        margin-left: 250px;
        width: 700px;
        height: 90vh;
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    form label{
        display: block;
        margin-left: 11px;
        font-size: 16px;
        font-weight: 600;
        padding: 5px;
    }

    button {
        margin: 175px;
        border: none;
        outline: none;
        padding: 8px;
        width: 252px;
        color: #f4f4f4;
        font-size: 20px;
        cursor: pointer;
        margin-top: 20px;
        border-radius: 5px;
        background: #668A89;

    }
    button:hover {
        background: rgba(214,86,64,1);
    }
    @media (max-width: 880px) {
        .container{
            width: 100px;
            max-width: 750px;
            margin-left: 20px;
            margin-right: 20px;
        }

        form {
            width: 00px;
            margin: 20px auto;
        }
        .register{
            width: 400px;
            padding: 20px;
        }
        button {
            width: 100%;
        }
        .right img {
            width: 100%;
        height: 100%; 
        }
    }
</style>
<div class="container">
    <div class="register">
        <form action="{{ route('register-proses') }}" method="post">
            @csrf
            <h1>Register</h1>
            <hr>
            <p>Make New Account</p>
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="please enter yourname!" autofocus value="{{ old('name') }}">
                        <label for="floatingInputGroup1">Name</label>
                    </div>
                    @error('name') 
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control rounded-top @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus value="{{ old('email') }}">
                        <label for="floatingInputGroup1">Email</label>
                    </div>
                    @error('email') 
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <div class="form-floating">
                        <input type="phone" name="phone" class="form-control rounded-top @error('phone') is-invalid @enderror" id="phone" placeholder="0812xxxxx" autofocus value="{{ old('phone') }}">
                        <label for="floatingInputGroup1">Phone</label>
                    </div>
                    @error('phone') 
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <div class="form-floating">
                        <input type="address" name="address" class="form-control rounded-top @error('address') is-invalid @enderror" id="address" placeholder="enter your address" autofocus value="{{ old('address') }}">
                        <label for="floatingInputGroup1">Address</label>
                    </div>
                    @error('address') 
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control rounded-top @error('password') is-invalid @enderror" id="password" placeholder="Password">
                        <label for="floatingInputGroup1">Password</label>
                    </div>
                    @error('password') 
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <button type="submit">Register</button>
            <p>
                Have Account? <a href="{{ route('login') }}">Login Now!</a>
            </p>
        </form>
    </div>
    <div class="right">
        <img src="{{ asset('assets/img/login/image.png') }}">
    </div>
</div>

@endsection