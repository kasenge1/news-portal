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
                            <a href="{{route('all.roles')}}" class="btn btn-success waves-effect waves-light">All Roles</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Roles</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <form  method="POST" action="{{route('store.roles')}}">
                        	@csrf

                            <div class="form-group col-md-8 mb-3">
                                <label for="pname" class="form-label">Role Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="pname" name="name" placeholder="Role Name">
                                @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-primary waves-effect waves-light">Add Role</button>

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