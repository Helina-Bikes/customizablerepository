@extends(Auth::user()->hasRole('System Owner') ? 'layouts.default' : 'layouts.admin')
@section('content')
<div class="container">
  <div class="row">
   <div class="col-md-12">
     <div class="card">
        <div class="card-header">
         <h4> Create Categories
            <a href="{{url('category')}}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
        <form action="{{ route('category.store') }}" method="POST">

            @csrf

            <div class="mb-3">
            <label for="catname">Category Name</label>
            <input type="text" name="catname" required class="form-control"><br>

            </div>
            
            <div class="mb-3">
            <label for="catdescription">Category Description</label>
            <input type="text" name="catdescription" required class="form-control"><br>

            </div>
            <div class="mb-3">
            <input type="hidden" name="department_id" value="{{ Auth::user()->department_id }}" class="form-control">
</div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </div>
     </div>
    
   </div>

  </div>

</div>


@endsection
