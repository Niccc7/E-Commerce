@extends('Template.Dashboard.index')
@section('content')
<div class="main-content-inner">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: sans-serif, rubik;
        }


        .Change a {
            position: absolute;
            top: 37%;
            left: 91.5%;
            border-radius: 0.5rem;
            background-color: #dadada;
        }

        .Change a:hover {
            background-color: #668A89;
        }

        .Change img {
            position: relative;
            width: 170px;
            height: 170PX;
            top: 20%;
            left: 92.2%;
        }

        .judul {
            position: relative;
            left: 70%;
        }
        .Photo {
            position: relative;
            left: 95%;
        }

        .Personal {
            position: relative;
            padding-top: 200px;
            font-size: 20px;
            width: 500px;
            padding-left: 100px;
            height: 10px;

        }

        .Personal hr {
            width: 270%;
        }

        .Data {
            display: grid;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto;
            padding-left: 150px;
            padding-top: 40px;
        }

        .grid-item {

            padding: 20px;
            padding-left: 60px;
            padding-top: 60px;
        }

        .profile {
            position: absolute;
            padding-top: 3%;
            padding-left: 48%;

        }
    </style>
    <div class="row">
        <div class="col-lg-6 col-ml-12">
            <div class="row">
                <h2 class="judul mt-4 text-capitalize">Halaman Profil {{ auth()->user()->name }}</h2>
                <div class="Photo mt-4">
                    <h3>Photo</h3>
                </div>
                <style>
                    img {
                        border-radius: 100%;
                    }
                </style>

                <div class="Change">
                    <img src="{{ asset('storage/foto-user/' . $profile->image) }}">
                    <a class="btn button mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <h6> Change Profile</h6>
                    </a>
                </div>

                <div class="Personal">
                    Personal Details
                    <hr>
                </div>

                <div class="grid-container">
                    <div class="grid-item">Name
                        <textarea id="Nama" name="Nama" rows="2" cols="50" readonly>{{ $profile->name }}</textarea>
                    </div>

                    <div class="grid-item">Email
                        <textarea id="Email" name="Email" rows="2" cols="50" readonly>{{ $profile->email }}</textarea>
                    </div>

                    <div class="grid-item">Phone Number
                        <textarea id="Phone" name="Phone" rows="2" cols="50" readonly>{{ $profile->phone }}</textarea>
                    </div>

                    <div class="grid-item">Alamat
                        <textarea id="Alamat" name="Alamat" rows="2" cols="50" readonly>{{ $profile->address }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- modal edit profile -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="header-title">Edit Profile</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('user.update-profile', ['id' => $profile->id]) }}" class="mb-5" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ $profile->name }}" required autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" required value="{{ $profile->email }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                            name="phone" required value="{{ $profile->phone }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                            name="address" required value="{{ $profile->address }}">
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    @if ($profile->image)
                        <img src="{{ asset('storage/foto-user/' . $profile->image) }}" alt="" width="100px"
                            height="100px">
                    @endif
                    <div class="mb-3">
                        <label for="image" class="form-label">Input gambar</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                            name="image" onchange="previewImage()">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
