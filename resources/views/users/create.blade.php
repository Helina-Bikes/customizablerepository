@extends('layouts.admin')

@section('content')
    <div class="card-header">
        <h4>Create User
          <a href="{{url('users')}}" class="btn btn-danger float-end">Back</a>
       </h4> 
</div>
<div class="card-body">     
        <form action="{{ url('users') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>

            <input type="hidden" name="orgname" value="{{ Auth::user()->orgname}}">

                            <input type="hidden" name="department_id" value="{{ Auth::user()->department_id }}">

<div class="form-group">
    <label for="">Role</label>
    <select name="roles[]" id="role_id" class="form-control" multiple required>
        <option value="">Select Role</option>
        @foreach($roles as $role) <!-- Use the correct role structure -->
            <option value="{{ $role }}">{{ $role }}</option>
        @endforeach
    </select>
    @error('role_id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>



            <button type="submit" class="btn btn-primary mt-3">Create User</button>
        </form>
    </div>
@endsection
