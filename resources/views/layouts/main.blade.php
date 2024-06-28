<!DOCTYPE html>
<html lang="en"> <!-- Deklarasi HTML dengan bahasa Inggris -->

<head>
  <meta charset="UTF-8"> <!-- Mengatur karakter encoding dokumen menjadi UTF-8 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Memastikan kompatibilitas dengan Internet Explorer -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur viewport untuk responsif di perangkat mobile -->
  <title>{{ $title }} Page</title> <!-- Mengatur judul halaman dengan menggunakan variabel 'title' -->
  <meta name="description" content="" /> <!-- Meta deskripsi kosong, bisa diisi sesuai kebutuhan -->
  <meta name="author" content="" /> <!-- Meta author kosong, bisa diisi sesuai kebutuhan -->

  <!-- Menggunakan stylesheet Simple DataTables dari CDN -->
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

  <!-- Menggunakan Font Awesome JS dari CDN untuk ikon -->
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

  @include('/partials/main_css') <!-- Menyertakan partial view untuk main CSS -->
  @stack('css-dependencies') <!-- Menambahkan stack untuk CSS dependencies tambahan -->
</head>

<body class="sb-nav-fixed"> <!-- Menambahkan kelas untuk fixed navigation bar -->
  <div id="loading" style="display: none"></div> <!-- Div untuk loading indicator, disembunyikan secara default -->

  {{-- Menyertakan topbar --}}
  @include('/partials/topbar')

  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      {{-- Menyertakan sidebar --}}
      @include('/partials/sidebar')
    </div>
    <div id="layoutSidenav_content">
      {{-- Menyertakan konten halaman --}}
      @yield("content")

      {{-- Menyertakan footer --}}
      @include('/partials/footer')
    </div>
  </div>

  @stack('modals-dependencies') <!-- Menambahkan stack untuk modal dependencies tambahan -->

  <!-- Menyertakan Bootstrap JS dari CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  <!-- Menyertakan jQuery dari CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <!-- Menyertakan Chart.js dari CDN untuk pembuatan chart -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

  <!-- Menyertakan custom script untuk DataTables -->
  <script src="/js/datatables-simple.js"></script>

  <!-- Menyertakan script umum -->
  <script src="/js/scripts.js"></script>

  <!-- Menyertakan SweetAlert2 dari CDN untuk notifikasi -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @stack('scripts-dependencies') <!-- Menambahkan stack untuk script dependencies tambahan -->
</body>

</html>
