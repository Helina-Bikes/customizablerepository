@extends('layouts.admin')
@section('content')
@include('nav-link')
<div class="container">
  <div class="row">
   <div class="col-md-12">
    @if(session('status'))
       <div class="alert alert-success">{{session('status')}}</div>
    @endif
     <div class="card">
        <div class="card-header">
         <h4>Permissions
            <a href="{{ url('permissions/create') }}" class="btn btn-primary float-end">Add Permission</a>
         </h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th> Id  </th>
                        <th> PerName  </th>
                        <th> Description  </th>
                        <th> Action  </th>
                    </tr>

</thead>
<tbody>
@foreach($permissions as $permission)
    <tr>
     <td>{{$permission->id}} </td>  
     <td> {{$permission->name}}</td>  
     <td> {{$permission->description}}</td>  
     <td>
      @can('Edit Permission')
     <a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="btn btn-sm btn-outline-success me-2 d-flex align-items-center">
     <i class="fas fa-edit me-1"></i>
      Edit</a>
      @endcan

      @can('Delete Permission')
     <a href="{{ url('permissions/'.$permission->id .'/delete') }}"  class="btn btn-sm btn-outline-danger d-flex align-items-center">
     <i class="fas fa-trash me-1"></i>
      Delete</a>
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
@endsection
