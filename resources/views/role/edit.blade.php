@extends(Auth::user()->hasRole('System Owner') ? 'layouts.default' : 'layouts.admin')
@section('content')
<div class="container">
  <div class="row">
   <div class="col-md-12">
     <div class="card">
        <div class="card-header">
         <h4> Edit Roles
            <a href="{{url('roles')}}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
        <form action="{{ url('roles/'.$role->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="">Role Name</label>
                <input type="text" name="name" value="{{$role->name}}"class="form-control"/>

            </div>
            
            <div class="mb-3">
                <label for="">Description</label>
                <input type="text" name="roledesc" value="{{$role->roledesc}}"class="form-control"/>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </div>
     </div>
    
   </div>

  </div>

</div>


@endsection
