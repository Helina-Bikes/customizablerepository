@extends(Auth::user()->hasRole('System Owner') ? 'layouts.default' : 'layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Category
                        <a href="{{ url('category') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="catname">Category Name</label>
                            <input type="text" name="catname" value="{{ old('catname', $category->catname) }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="catdescription">Category Description</label>
                            <textarea name="catdescription" class="form-control" required>{{ old('catdescription', $category->catdescription) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <input type="hidden" name="department_id" value="{{ $category->department_id }}">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
