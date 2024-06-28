@extends('/layouts/auth') <!-- Menggunakan layout 'auth' dari folder layouts -->

@push('css-dependencies')
<link href="/css/auth.css" rel="stylesheet" /> <!-- Menambahkan stylesheet auth.css ke dalam stack css-dependencies -->
@endpush

@section("content") <!-- Mendefinisikan bagian 'content' yang akan menggantikan placeholder 'content' di layout 'auth' -->
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center"> <!-- Mengatur row agar berada di tengah halaman -->

        <div class="col-lg-7"> <!-- Mengatur kolom dengan ukuran 7 pada layar besar -->

            <div class="card o-hidden border-0 shadow-lg my-5"> <!-- Membuat card dengan border dan shadow -->
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg"> <!-- Kolom yang berisi form login -->
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ $title }} Page</h1> <!-- Menampilkan judul halaman dinamis dengan variabel $title -->
                                </div>

                                @if(session()->has('message'))
                                {!! session("message") !!} <!-- Menampilkan pesan dari session jika ada -->
                                @endif

                                <form class="user" method="post" action="/auth/login"> <!-- Form login -->
                                    @csrf <!-- Token CSRF untuk keamanan -->
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                          id="email" name="email" placeholder="Enter an email address" value="{{ old('email') }}"> <!-- Input untuk email -->
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div> <!-- Menampilkan pesan error jika ada -->
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" data-toggle="password"> <!-- Input untuk password -->
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div> <!-- Menampilkan pesan error jika ada -->
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-info btn-block"> <!-- Tombol submit -->
                                        Login
                                    </button>
                                </form>
                                <hr>

                                <div class="text-center">
                                    <a class="small" href="/auth/register">Belum memiliki akun? Buat sekarang!</a> <!-- Tautan untuk pengguna yang belum memiliki akun -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection <!-- Menutup bagian 'content' -->
