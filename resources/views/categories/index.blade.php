@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Category List
                        <a href="{{ url('category/create') }}" class="btn btn-primary float-end">Add Category</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Department</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id}}</td>
                                    <td>{{ $category->catname }}</td>
                                    <td>{{ $category->catdescription }}</td>
                                    <td>{{ $category->departmentname }}</td>
                                    <td>
    @can('Edit Category')
        <a href="{{ url('category/'.$category->id.'/edit') }}" class="btn btn-success">Edit</a>
    @endcan
    @can('Delete Category')
        <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline" id="delete-form-{{ $category->id }}">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $category->id }})">
                Delete
            </button>
        </form>
    @endcan
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
    function confirmDelete(categoryId) {
        if (confirm("Are you sure you want to delete this category? This action cannot be undone.")) {
            document.getElementById('delete-form-' + categoryId).submit();
        }
    }
</script>

@endsection
