<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8"> <!-- Mengatur karakter encoding dokumen menjadi UTF-8 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Memastikan kompatibilitas dengan Internet Explorer -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur viewport untuk responsif di perangkat mobile -->
  <title>{{ $title }} Page</title> <!-- Mengatur judul halaman dengan menggunakan variabel 'title' -->

  <!-- Menggunakan font Nunito dari Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Menggunakan Bootstrap CSS dari CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Menggunakan Font Awesome CSS dari CDN untuk ikon -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  @include('/partials/main_css') <!-- Menyertakan partial view untuk main CSS -->
  @stack('css-dependencies') <!-- Menambahkan stack untuk CSS dependencies tambahan -->
</head>

<body>
  @yield("content") <!-- Placeholder untuk konten halaman spesifik -->

  <!-- Menyertakan jQuery dari CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <!-- Menyertakan Bootstrap JS dari CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  <!-- Menyertakan plugin untuk menampilkan/menghilangkan password pada input -->
  <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

  @stack('scripts-dependencies') <!-- Menambahkan stack untuk script dependencies tambahan -->
</body>

</html>
