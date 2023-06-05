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
                            <a href="{{route('all.admin')}}" class="btn btn-success waves-effect waves-light">All Admin</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Admin</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <form  method="POST" action="{{route('store.admin')}}">
                        	@csrf
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="name" class="form-label">name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  value="{{old('name')}}">
                                    @error('name')
                                    	<div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                 <div class="form-group col-md-6 mb-3">
                                    <label for="username" class="form-label">Userame</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{old('username')}}">
                                    @error('username')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                 <div class="form-group col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
                                    @error('email')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                 <div class="form-group col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{old('phone')}}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="roles" class="form-label">Asign Roles</label>
                                    <select class="form-select" name="roles">
                                        <option>--select role--</option>
                                        @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                    @error('password')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
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