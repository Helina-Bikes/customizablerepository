@extends('layouts.default')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Department</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('department.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="departmentname" class="form-label">Department Name</label>
                            <input type="text" class="form-control" id="departmentname" name="departmentname" required>
                        </div>
                        <div class="mb-3">
                            <label for="departmentdesc" class="form-label">Description</label>
                            <textarea class="form-control" id="departmentdesc" name="departmentdesc" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Department</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
