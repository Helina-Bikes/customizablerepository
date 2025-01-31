@extends(Auth::user()->hasRole('System Owner') ? 'layouts.default' : 'layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Products
                        <a href="{{ url('product/create') }}" class="btn btn-primary float-end">Add Product</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                               <th>Id</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Price per Unit</th>
                                <th>Rental Price per Unit</th>
                                <th>Status</th>
                                <th>Expiration</th>
                                <th>Category</th>
                                <th>Department</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                <td>{{ $product->id }}</td>
                                    <td>{{ $product->productname }}</td>
                                    <td>{{ $product->productdesc }}</td>
                                    <td>{{ $product->productquantity }}</td>
                                    <td>{{ $product->priceperunit }}</td>
                                    <td>{{ $product->rentalperunit }}</td>
                                    <td>{{ $product->status }}</td>
                                    <td>{{ $product->expdate }}</td>
                                    <td>{{ $product->catname }}</td>
                                    <td>{{ $product->departmentname }}</td>
                                    <td>
                                    @can('Edit Product')
                                            <a href="{{ url('product/'.$product->id.'/edit') }}" class="btn btn-sm btn-outline-success me-2 d-flex align-items-center"> <i class="fas fa-edit me-1"></i>Edit</a>
                                        @endcan
                                        @can('Delete Product')
                                            <form action="{{ url('product/'.$product->id) }}" method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger d-flex align-items-center"> <i class="fas fa-trash me-1"></i>Delete</button>
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
    // Confirmation for delete
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                const confirmed = confirm('Are you sure you want to delete this product?');
                if (!confirmed) {
                    event.preventDefault();
                }
            });
        });
    });
</script>


@endsection
