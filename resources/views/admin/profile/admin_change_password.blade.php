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
                           
                        </div>
                        <h4 class="page-title">Change Password</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title -->

            <div class="row">
 

                <div class="col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="tab-content">
                               

                                <div class="" id="settings">
                                    <form method="POST" action="{{route('admin.update.password')}}">
                                        @csrf

                                        @if(session('status'))
                                        	<div class="alert alert-success" role="alert">{{session('status')}}</div>

                                        @elseif(session('error'))
                                        	<div class="alert alert-danger" role="alert">{{session('error')}}</div>

                                        @endif
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="oldpassword" class="form-label">Old Password</label>
                                                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="current_password"  name="old_password">
                                                    @error('old_password')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="new_password" class="form-label">New Password</label>
                                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password"  value="" name="new_password">
                                                    @error('new_password')<span class="text-danger">{{$message}}</span>@enderror
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="confirm_password" class="form-label">Confirm New Password</label>
                                                    <input type="password" class="form-control " id="new_password_confirmation" value="" name="new_password_confirmation">
                                                   
                                                </div>
                                            </div>
                                        </div> 
                                        <!-- end row -->                                       
                                        
                                        <div >
                                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Change Password</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end settings content-->

                            </div> <!-- end tab-content -->
                        </div>
                    </div> <!-- end card-->

                </div> <!-- end col -->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div>

@endsection