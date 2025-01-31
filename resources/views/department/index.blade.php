@extends('layouts.default')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Department List
                        <a href="{{ route('department.create') }}" class="btn btn-primary float-end">Add Department</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Department Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{ $department->id }}</td>
                                    <td>{{ $department->departmentname }}</td>
                                    <td>{{ $department->departmentdesc }}</td>
                                    <td>
                                        <a href="{{ route('department.edit', $department->id) }}" class="btn btn-success">Edit</a>
                                        <form action="{{ route('department.destroy', $department->id) }}" method="POST" class="d-inline" id="delete-form-{{ $department->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $department->id }})">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(departmentId) {
        if (confirm("Are you sure you want to delete this department? This action cannot be undone.")) {
            document.getElementById('delete-form-' + departmentId).submit();
        }
    }
</script>

@endsection
