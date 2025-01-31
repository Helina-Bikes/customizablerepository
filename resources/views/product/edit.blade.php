@extends(Auth::user()->hasRole('System Owner') ? 'layouts.default' : 'layouts.admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Product
                        <a href="{{ route('product.index') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="productname" class="form-label">Product Name</label>
                            <input type="text" name="productname" value="{{ old('productname', $product->productname) }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="productdesc" class="form-label">Description</label>
                            <textarea name="productdesc" class="form-control" rows="3" required>{{ old('productdesc', $product->productdesc) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="productquantity" class="form-label">Quantity</label>
                            <input type="number" name="productquantity" value="{{ old('productquantity', $product->productquantity) }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="priceperunit" class="form-label">Price per Unit</label>
                            <input type="number" step="0.01" name="priceperunit" value="{{ old('priceperunit', $product->priceperunit) }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="rentalperunit" class="form-label">Rental Price per Unit</label>
                            <input type="number" step="0.01" name="rentalperunit" value="{{ old('rentalperunit', $product->rentalperunit) }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" name="status" value="{{ old('status', $product->status) }}" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="expdate" class="form-label">Expiration Date</label>
                            <input type="date" name="expdate" value="{{ old('expdate', $product->expdate) }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->catname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="department_id" value="{{ $product->department_id }}">


                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
