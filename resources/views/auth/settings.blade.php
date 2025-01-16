@extends("layouts.default")

@section("content")
<div style="background-color: #f0f0f0; padding: 20px;">
    <h1>Profile Settings</h1>

    <!-- Display success message if set -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display profile picture if set -->
    @if(session('profile_picture'))
        <img src="{{ asset('storage/' . session('profile_picture')) }}" alt="Profile Picture" width="150">
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="form-control" required>
        </div>
       
        <div class="mb-3">
            <label for="profile_picture" class="form-label">Profile Picture:</label>
            <input type="file" id="profile_picture" name="profile_picture" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection
