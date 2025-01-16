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
         <h4>Roles
            <a href="{{ url('roles/create') }}" class="btn btn-primary float-end">Add Role</a>
         </h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th> Id  </th>
                        <th> Name  </th>
                        <th> Description  </th>
                        <th> Action  </th>
                    </tr>

</thead>
<tbody>
@foreach($roles as $role)
    <tr>
     <td>{{$role->id}} </td>  
     <td> {{$role->name}}</td>  
     <td> {{$role->roledesc}}</td>  
     <td>
     <a href="{{ url('roles/'.$role->id.'/give-permissions') }}" class="btn btn-success">
      Add/Edit Role Permission
    </a>
    @can('Edit Roles')
     <a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-success">
      Edit  </a>
    @endcan  

    @can('Delete Roles')
     <a href="{{ url('roles/'.$role->id .'/delete') }}" class="btn btn-danger mx-2">
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
