@extends('layouts.admin')

@section('content')
<script>
        function handleProductTypeChange() {
            const productType = document.getElementById('productType').value;
            const pricePerUnitField = document.getElementById('pricePerUnitField');
            const rentalPerUnitField = document.getElementById('rentalPerUnitField');

            // Initially hide both fields
            pricePerUnitField.style.display = 'none';
            rentalPerUnitField.style.display = 'none';

            // Show the fields based on the selected product type
            if (productType === 'for_sale') {
                pricePerUnitField.style.display = 'block';
            } else if (productType === 'for_rental') {
                rentalPerUnitField.style.display = 'block';
            } else if (productType === 'both') {
                pricePerUnitField.style.display = 'block';
                rentalPerUnitField.style.display = 'block';
            }
        }
    </script>
    <div class="container mt-5">
        <h1>Add New Product</h1>
        <form action="{{ route('product.store') }}" method="POST" class="form-container">
            @csrf

            <div class="form-group">
                <label for="productname">Product Name:</label>
                <input type="text" name="productname" id="productname" class="form-control" value="{{ old('productname') }}" required>
                @error('productname')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="productdesc">Description:</label>
                <input type="text" name="productdesc" id="productdesc" class="form-control" value="{{ old('productdesc') }}" required>
                @error('productdesc')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="productquantity">Quantity:</label>
                <input type="number" name="productquantity" id="productquantity" class="form-control" value="{{ old('productquantity') }}" required>
                @error('productquantity')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="form-control" required>
                    <option value="in_stock">In Stock</option>
                    <option value="out_of_stock">Out of Stock</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->catname }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="producttype">Product Type:</label>
                <select name="producttype" id="productType" class="form-control" onchange="handleProductTypeChange()" required>
                    <option value="">Select Type</option>
                    <option value="for_sale">For Sale</option>
                    <option value="for_rental">For Rental</option>
                    <option value="both">Both</option>
                </select>
            </div>

            <!-- Price Per Unit Field -->
            <div id="pricePerUnitField" style="display: none;" class="form-group">
                <label>Price per Unit:</label>
                <input type="text" name="priceperunit" class="form-control">
            </div>

            <!-- Rental Per Unit Field -->
            <div id="rentalPerUnitField" style="display: none;" class="form-group">
                <label>Rental per Unit:</label>
                <input type="text" name="rentalperunit" class="form-control">
            </div>

            <div class="form-group">
                <label>ExpDate:</label>
                <input type="date" name="expdate" class="form-control" required>
            </div>

            <input type="hidden" name="department_id" value="{{ Auth::user()->department_id }}">

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
@endsection


   


<style>
    .form-container {
        max-width: 800px;
        margin: 0 ;
    }
    .form-group {
        margin-bottom: 1rem;
    }
    .form-group label {
        font-weight: bold;
    }
    .form-control {
        width: 100%;
        padding: 0.5rem;
        border-radius: 0.25rem;
    }
    .btn-primary {
        margin-top: 1rem;
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
    }
</style>
