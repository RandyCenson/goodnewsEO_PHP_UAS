@extends('/layouts/main')


@section('content')
<div class="container">
    <h1>Admin Notes</h1>

    <!-- Form untuk membuat catatan baru -->
    <form action="{{ route('admin.notes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Note</button>
    </form>

    <hr>

    <!-- Daftar catatan admin -->
    <h2>List of Notes</h2>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($notes as $note)
            <tr>
                <td>{{ $note->title }}</td>
                <td>{{ Str::limit($note->content, 50) }}</td>
                <td>
                    <form action="{{ route('admin.notes.destroy', $note->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
