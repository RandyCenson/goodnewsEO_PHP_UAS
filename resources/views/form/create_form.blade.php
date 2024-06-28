@extends('/layouts/auth') <!-- Menggunakan layout 'auth' dari folder layouts -->

@push('css-dependencies')
<link href="/css/auth.css" rel="stylesheet" /> <!-- Menambahkan stylesheet auth.css ke dalam stack css-dependencies -->
@endpush

@section("content") <!-- Mendefinisikan bagian 'content' yang akan menggantikan placeholder 'content' di layout 'auth' -->
<div class="container pb-2">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto"> <!-- Membuat card dengan border dan shadow, ditempatkan di tengah halaman -->
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg"> <!-- Kolom yang berisi form registrasi -->
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">{{ $title }} Page</h1> <!-- Menampilkan judul halaman dinamis dengan variabel $title -->
                        </div>

                        @if(session()->has('message'))
                        {!! session("message") !!} <!-- Menampilkan pesan dari session jika ada -->
                        @endif

                        <form class="user" method="post" action="/auth/register"> <!-- Form registrasi -->
                            @csrf <!-- Token CSRF untuk keamanan -->
                            <div class="form-group">
                                <input type="text" class="form-control @error('fullname') is-invalid @enderror"
                                  id="fullname" name="fullname" placeholder="Full Name" value="{{ old('fullname') }}"> <!-- Input untuk nama lengkap -->
                                @error('fullname')
                                <div class="text-danger">{{ $message }}</div> <!-- Menampilkan pesan error jika ada -->
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                  id="username" name="username" placeholder="Username" value="{{ old('username') }}"> <!-- Input untuk username -->
                                @error('username')
                                <div class="text-danger">{{ $message }}</div> <!-- Menampilkan pesan error jika ada -->
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                  name="email" placeholder="Email Address" value="{{ old('email') }}"> <!-- Input untuk email -->
                                @error('email')
                                <div class="text-danger">{{ $message }}</div> <!-- Menampilkan pesan error jika ada -->
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                      id="password" name="password" placeholder="Password" data-toggle="password"> <!-- Input untuk password -->
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div> <!-- Menampilkan pesan error jika ada -->
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="password"
                                      class="form-control @error('password_confirmation') is-invalid @enderror"
                                      id="password_confirmation" name="password_confirmation"
                                      placeholder="Password Confirmation" data-toggle="password"> <!-- Input untuk konfirmasi password -->
                                    @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div> <!-- Menampilkan pesan error jika ada -->
                                    @enderror
                                </div>
                            </div>
                            <div class="ml-2">Gender</div> <!-- Label untuk pilihan gender -->
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="M" {{
                                  old('gender')=="M" ? 'checked' : '' }}> <!-- Input radio untuk gender laki-laki -->
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check ml-3">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="F" {{
                                  old('gender')=="F" ? 'checked' : '' }}> <!-- Input radio untuk gender perempuan -->
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                                @error('gender')
                                <div class="text-danger">{{ $message }}</div> <!-- Menampilkan pesan error jika ada -->
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                  name="phone" placeholder="Phone" value="{{ old('phone') }}"> <!-- Input untuk nomor telepon -->
                                @error('phone')
                                <div class="text-danger">{{ $message }}</div> <!-- Menampilkan pesan error jika ada -->
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                  id="address" name="address" placeholder="Address" value="{{ old('address') }}"> <!-- Input untuk alamat -->
                                @error('address')
                                <div class="text-danger">{{ $message }}</div> <!-- Menampilkan pesan error jika ada -->
                                @enderror
                            </div>
                            <input type="hidden" name="role_id" value="2" /> <!-- Menyembunyikan input untuk role_id, role 2 untuk customer -->
                            <button type="submit" class="btn btn-info btn-block">
                                Submit
                            </button> <!-- Tombol submit -->
                        </form>

                        <hr>

                        <div class="text-center">
                            <a class="small" href="/auth/login">Already have account? Login now!</a> <!-- Tautan untuk pengguna yang sudah memiliki akun untuk login -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection <!-- Menutup bagian 'content' -->
