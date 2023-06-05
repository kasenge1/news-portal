@extends('admin.admin_dashboard')
@section('admin')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{route('add.admin')}}" class="btn btn-success waves-effect waves-light">Add Admin</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Edite Admin</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <form  method="POST" action="{{route('update.admin')}}">
                        	@csrf

                            <input type="hidden" name="id" value="{{$user->id}}">
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="name" class="form-label">name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  value="{{$user->name}}">
                                    @error('name')
                                    	<div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                 <div class="form-group col-md-6 mb-3">
                                    <label for="username" class="form-label">Userame</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{$user->username}}">
                                    @error('username')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                 <div class="form-group col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$user->email}}">
                                    @error('email')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                 <div class="form-group col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{$user->phone}}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>  

                                <div class="form-group col-md-6 mb-3">
                                    <label for="roles" class="form-label">Asign Roles</label>
                                    <select class="form-select" name="roles">
                                        <option>--select role--</option>
                                        @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{$user->hasRole($role->name)? 'selected': ''}} >{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>



                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Add New Admin</button>

                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        
    </div>
     <!-- container -->

</div>


@endsection