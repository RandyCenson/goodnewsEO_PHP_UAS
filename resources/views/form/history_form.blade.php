<!-- resources/views/form/history.blade.php -->

@extends('/layouts/main')<!-- Jika menggunakan layout -->

@section('content')
    <div class="container">
        <h1>Form Submission History</h1>

        @if ($forms->isEmpty())
            <p>No forms submitted yet.</p>
        @else
            <ul>
                @foreach ($forms as $form)
                    <li>
                        <strong>Name:</strong> {{ $form->name }} <br>
                        <strong>Email:</strong> {{ $form->email }} <br>
                        <strong>Phone:</strong> {{ $form->phone }} <br>
                        <strong>Address:</strong> {{ $form->address }} <br>
                        <strong>Party Type:</strong> {{ $form->party_type }} <br>
                        <strong>Daerah Party:</strong> {{ $form->daerah_party }} <br>
                        <strong>Submitted At:</strong> {{ $form->created_at->format('Y-m-d H:i:s') }} <br>
                    </li>
                    <hr>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
