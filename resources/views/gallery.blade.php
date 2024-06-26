@extends('/layouts/main')

@push('css-dependencies')
<link rel="stylesheet" type="text/css" href="/css/gallery.css" />
@endpush

@push('scripts-dependencies')
<script src="/js/gallery.js"></script>
@endpush

@section('content')
<div class="container-fluid px-3">
    <!-- flasher -->
    @if(session()->has('message'))
    {!! session("message") !!}
    @endif
    <h1>Image Gallery</h1>
    <div class="product">
        @foreach($images as $image)
        <div class="image">
            <img src="{{ asset($image) }}" alt="Image">
        </div>
        @endforeach
    </div>
</div>
@endsection
