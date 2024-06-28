<!-- resources/views/form/history.blade.php -->

@extends('/layouts/main') <!-- Menggunakan layout 'main' dari folder layouts -->

@section('content') <!-- Mendefinisikan bagian 'content' yang akan menggantikan placeholder 'content' di layout 'main' -->
    <div class="container">
        <h1>Form Submission History</h1> <!-- Judul halaman -->

        @if ($forms->isEmpty())
            <p>No forms submitted yet.</p> <!-- Pesan jika tidak ada form yang telah disubmit -->
        @else
            <ul>
                @foreach ($forms as $form) <!-- Looping melalui setiap form yang disubmit -->
                    <li>
                        <strong>Name:</strong> {{ $form->name }} <br> <!-- Menampilkan nama dari form -->
                        <strong>Email:</strong> {{ $form->email }} <br> <!-- Menampilkan email dari form -->
                        <strong>Phone:</strong> {{ $form->phone }} <br> <!-- Menampilkan nomor telepon dari form -->
                        <strong>Address:</strong> {{ $form->address }} <br> <!-- Menampilkan alamat dari form -->
                        <strong>Party Type:</strong> {{ $form->party_type }} <br> <!-- Menampilkan jenis pesta dari form -->
                        <strong>Daerah Party:</strong> {{ $form->daerah_party }} <br> <!-- Menampilkan daerah pesta dari form -->
                        <strong>Submitted At:</strong> {{ $form->created_at->format('Y-m-d H:i:s') }} <br> <!-- Menampilkan waktu form disubmit -->
                    </li>
                    <hr> <!-- Garis pemisah antara form -->
                @endforeach
            </ul>
        @endif
    </div>
@endsection <!-- Menutup bagian 'content' -->
