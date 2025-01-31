@extends('layouts.default')

@section('content')
<div class="row mt-2 pr-4">
    <!-- Total Products Card -->
    <div class="row mt-5 ml-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-primary text-white shadow-lg mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="card-title text-white">Total Products</h4>
                    <h5 class="card-text text-white">{{ \App\Models\Product::count() }}</h5>
                </div>
                <div>
                    <i class="fas fa-box-open fa-1x text-white"></i>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="{{ route('product.index') }}">View Details</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>

    <!-- Total Users Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-warning text-dark shadow-lg mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="card-title text-dark">Total Users</h4>
                    <h5 class="card-text text-dark">{{ \App\Models\User::count() }}</h5>
                </div>
                <div>
                    <i class="fas fa-users fa-3x text-dark"></i>
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 d-flex align-items-center justify-content-between">
                <a class="small text-dark stretched-link" href="{{ route('users.index') }}">View Details</a>
                <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
            </div>
        </div>
    </div>




<!-- total category -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card bg-warning text-dark shadow-lg mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <h4 class="card-title text-dark">Total Organizations</h4>
                <h5 class="card-text text-dark">{{ \App\Models\Department::count() }}</h5>
            </div>
            <div>
                <!-- Updated Icon -->
                <i class="fas fa-th-list fa-1x text-dark"></i> <!-- You can change this icon as needed -->
            </div>
        </div>
        <div class="card-footer bg-transparent border-0 d-flex align-items-center justify-content-between">
            <a class="small text-dark stretched-link" href="{{ route('department.index') }}">View Details</a>
            <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
        </div>
    </div>
</div>

</div>

</div>


<!-- Tables Section -->
<div class="row">
    <!-- Recently Added Products Table -->
    <div class="col-lg-6">
        <div class="card shadow-lg mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Recently Added Products</h5>
            </div>
            <div class="card-body">
            <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Exp Date</th>
        </tr>
    </thead>
    <tbody>
        @if($recentProducts->isNotEmpty())
            @foreach($recentProducts as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->productname }}</td>
                    <td>{{ $product->productdesc }}</td>
                    <td>{{ $product->productquantity }}</td>
                    <td>${{ $product->priceperunit }}</td>
                    <td>{{ $product->expdate }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6">No products found.</td>
            </tr>
        @endif
    </tbody>
</table>

            </div>
        </div>
    </div>

    <!-- Recently Registered Users Table -->
    <div class="col-lg-6">
        <div class="card shadow-lg mb-4">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">Recently Registered Users</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Registered On</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentUsers as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
