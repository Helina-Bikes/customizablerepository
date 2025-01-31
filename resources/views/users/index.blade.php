@extends(Auth::user()->hasRole('System Owner') ? 'layouts.default' : 'layouts.admin')
@section('content')
    <div class="container">
        <h1>Users List</h1>
        <a href="{{ url('users/create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Add User
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Organization Name </th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
@foreach($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{$user->orgname}}</td>
        <td>
    @if($user->roles->isNotEmpty())
        @foreach($user->roles as $role)
            <span class="badge bg-primary">{{ $role->name }}</span>
        @endforeach
    @else
        <span class="text-muted">No Role Assigned</span>
    @endif
</td>
        </td>
        <td>
            @can('Edit Users')
            <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-sm btn-outline-success me-2 d-flex align-items-center"> 
                <i class="fas fa-edit me-1"></i>
                 Edit
            </a>
            @endcan
    

            @can('Delete Users')
    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit"  class="btn btn-sm btn-outline-danger d-flex align-items-center">
            <i class="fas fa-trash me-1"></i>Delete</button>
    </form>
@endcan

        </td>
    </tr>
@endforeach

            </tbody>
        </table>
    </div>
@endsection
