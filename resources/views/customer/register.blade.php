@extends('layouts.customer')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Customer Registration</h2>
    <form method="POST" action="{{ route('customer.registerr') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="phoneno" class="form-label">Phone No</label>
            <input type="phoneno" class="form-control" id="phoneno" name="phoneno" required>
        </div>
        <option value="">Select Organization</option>
                                @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->departmentname }}</option>
                                @endforeach
                                </select>
                                @if($errors->has('department_id'))
                                <span class="text-danger">{{ $errors->first('department_id') }}</span>
                                @endif
                            </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@endsection
