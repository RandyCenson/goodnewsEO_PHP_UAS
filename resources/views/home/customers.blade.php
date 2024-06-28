@extends('/layouts/main') <!-- Menggunakan layout 'main' dari folder layouts -->

@push('css-dependencies')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" /> <!-- Menambahkan stylesheet untuk DataTables ke dalam stack css-dependencies -->
@endpush

@push('scripts-dependencies')
<script src="/js/customers_table.js"></script> <!-- Menambahkan script custom customers_table.js ke dalam stack scripts-dependencies -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> <!-- Menambahkan script DataTables ke dalam stack scripts-dependencies -->
@endpush

@section('content') <!-- Mendefinisikan bagian 'content' yang akan menggantikan placeholder 'content' di layout 'main' -->

<div class="container-fluid mt-4 px-3">

    @include('/partials/breadcumb') <!-- Menyertakan partial untuk breadcrumb -->

    <!-- inisial value -->
    <input type="hidden" name="username" id="username" value="{{ (isset($_GET['username'])) ? $_GET['username'] : '' }}"> <!-- Menyimpan nilai username dari query string jika ada -->

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-fw fa-solid fa-users me-1"></i> <!-- Ikon pengguna -->
            Customers
        </div>
        <div class="card-body">
            <table id="datatablesSimple"> <!-- Tabel dengan id 'datatablesSimple' -->
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $row) <!-- Looping melalui setiap customer -->
                    <tr>
                        <td>{{ $row->fullname }}</td> <!-- Menampilkan nama lengkap customer -->
                        <td>{{ $row->username }}</td> <!-- Menampilkan username customer -->
                        <td>{{ $row->email }}</td> <!-- Menampilkan email customer -->
                        <td>{{ $row->role->role_name }}</td> <!-- Menampilkan nama role customer -->
                        <td>{{ $row->gender == "M" ? "Male" : "Female" }}</td> <!-- Menampilkan gender customer (Male/Female) -->
                        <td>{{ $row->phone }}</td> <!-- Menampilkan nomor telepon customer -->
                        <td>{{ $row->address }}</td> <!-- Menampilkan alamat customer -->
                        <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td> <!-- Menampilkan tanggal pembuatan akun customer dalam format d-m-Y -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection <!-- Menutup bagian 'content' -->
