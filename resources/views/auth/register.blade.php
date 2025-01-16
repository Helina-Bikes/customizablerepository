@extends("layouts.default")
@section("title","Register")
@section("content")
   <main class="mt-5">
     <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @if(session()->has("success"))
                  <div class="alert alert-success">
                    {{session()->get("success")}}
                  </div>
                @endif
                @if(session()->has("error"))
                  <div class="alert alert-danger">
                    {{session()->get("error")}}
                  </div>
                @endif

                <div class="card">
                    <h3 class="card-header text-center">Register</h3>
                    <div class="card-body">
                        <form method="POST" action="{{route('register.post')}}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="FullName"
                                       id="name" class="form-control" name="name" 
                                       required autofocus>
                                       @if ($errors->has('email'))
                                       <span class="text-danger">
                                        {{$errors->first('name')}} </span>
                                        @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email"
                                       id="email" class="form-control" name="email" 
                                       required autofocus>
                                       @if ($errors->has('email'))
                                       <span class="text-danger">
                                        {{$errors->first('email')}} </span>
                                        @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" 
                                       id="password" class="form-control" name="password"
                                       required autofocus>
                                       @if($errors->has('password'))
                                       <span class="text-danger">{{$errors->first('password')}} </span>
                                       @endif   
                            </div>
                            <div class="form-group mb-3">
        <input type="password" placeholder="Confirm Password" id="password_confirmation" class="form-control" name="password_confirmation" required>
        @if ($errors->has('password_confirmation'))
        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
        @endif
    </div> 
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Organization Name" 
                                       id="orgname" class="form-control" name="orgname"
                                       required autofocus>
                                       @if($errors->has('orgname'))
                                       <span class="text-danger">{{$errors->first('orgname')}} </span>
                                       @endif   
                            </div> 
                            <div class="form-group mb-3">
                                <label for="department_id">Department</label>
                                <select id="department_id" class="form-control" name="department_id">
                                <option value="">Select Organization</option>
                                @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->departmentname }}</option>
                                @endforeach
                                </select>
                                @if($errors->has('department_id'))
                                <span class="text-danger">{{ $errors->first('department_id') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
    <label for="role_id">Role</label>
    <select id="role_id" class="form-control" name="role_id" required>
        <option value="">Select Role</option>
        @foreach ($roles as $role)
            @if ($role->id == 1)  <!-- Super Admin role -->
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endif
        @endforeach
    </select>
    @if($errors->has('role_id'))
        <span class="text-danger">{{ $errors->first('role_id') }}</span>
    @endif
</div>

                            <div class="form-group mb-3">
                            <div class="checkbox">
                            <label> 
                            <input type="checkbox" name="remember"> Remember Me
                            </label>
                            </div> 
                            </div>
                            <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-dark btn-block">SignUp </button> 
                            <a href="{{ route('login') }}" class="text-decoration-none">Already have account Login</a>  
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</main>


@endsection