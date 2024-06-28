@extends('/layouts/auth') <!-- Menggunakan layout 'auth' dari folder layouts -->

@push('css-dependencies')
<link href="/css/landing.css" rel="stylesheet" /> <!-- Menambahkan stylesheet landing.css ke dalam stack css-dependencies -->
@endpush

@push('scripts-dependencies')
<script src="/js/landing.js"></script> <!-- Menambahkan script landing.js ke dalam stack scripts-dependencies -->
@endpush

@section("content") <!-- Mendefinisikan bagian 'content' yang akan menggantikan placeholder 'content' di layout 'auth' -->
<header class="masthead">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center"> <!-- Kontainer dengan padding dan flexbox untuk align-center dan justify-center -->
        <div class="d-flex justify-content-center"> <!-- Flexbox untuk centering konten -->
            <div class="text-center"> <!-- Konten yang di tengah-tengah -->
                <h1 class="mx-auto my-0 text-uppercase">Goodnews <span style="font-size: 20px"><br>Event Organizer</span></h1> <!-- Judul utama dengan teks 'Goodnews Event Organizer' -->
                <h2 class="text-white-50 mx-auto mt-2 mb-5"> <!-- Subjudul dengan teks 'make your event more interesting' -->
                    make your event more interesting
                </h2>
                <a class="btn btn-primary" href="auth">Get Started</a> <!-- Tombol untuk mulai, mengarah ke halaman 'auth' -->
            </div>
        </div>
    </div>
</header>
@endsection <!-- Menutup bagian 'content' -->
