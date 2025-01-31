@extends(Auth::user()->hasRole('System Owner') ? 'layouts.default' : 'layouts.admin')

@section('content')
    <div class="card-header">
        <h4>Edit User
          <a href="{{ url('users') }}" class="btn btn-danger float-end">Back</a>
       </h4> 
    </div>

    <div class="card-body">     
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- This is needed for PUT requests -->

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <input type="text" placeholder="Organization Name" id="orgname" class="form-control" name="orgname" value="{{ old('orgname', $user->orgname) }}" required autofocus>
                @error('orgname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror   
            </div>

            <div class="form-group">
                <label for="department_id">Department</label>
                <select name="department_id" id="department_id" class="form-control" required>
                    <option value="">Select Department</option>
                    @foreach($departments as $id => $departmentname)
                        <option value="{{ $id }}" {{ $user->department_id == $id ? 'selected' : '' }}>{{ $departmentname }}</option>
                    @endforeach
                </select>
                @error('department_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
    <label for="role_id">Roles</label>
    <select name="role_ids[]" id="role_id" class="form-control" multiple required>
        @foreach($roles as $id => $name)
            <option value="{{ $id }}" {{ in_array($id, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>
                {{ $name }}
            </option>
        @endforeach
    </select>
    @error('role_ids')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>


            <button type="submit" class="btn btn-primary mt-3">Update User</button>
        </form>
    </div>
@endsection
