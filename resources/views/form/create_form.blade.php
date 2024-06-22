<!-- File: resources/views/order/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Order Form</title>
</head>
<body>
    <h1>Order Form</h1>

    @if(session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('Form.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}">
            @error('phone')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="{{ old('address') }}">
            @error('address')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="party_type">Party Type:</label>
            <input type="text" id="party_type" name="party_type" value="{{ old('party_type') }}">
            @error('party_type')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="daerah_party">Daerah Party:</label>
            <input type="text" id="daerah_party" name="daerah_party" value="{{ old('daerah_party') }}">
            @error('daerah_party')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">Place Order</button>
        </div>
    </form>
</body>
</html>
