@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                
                                <li class="breadcrumb-item active">Admin Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Admin Profile</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-4 col-xl-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="{{ (!empty($adminData->photo))? url('upload/user_images/'.$adminData->photo): url('upload/no_image.jpg')}}" class="rounded-circle avatar-lg img-thumbnail"
                            alt="profile-image">

                            <h4 class="mb-0">{{$adminData->name}}</h4>
                            <p class="text-muted">@ {{$adminData->username}}</p>

                            <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>
                            <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button>

                            <div class="text-start mt-3">
                                <h4 class="font-13 text-uppercase">About Me :</h4>
                                <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">{{$adminData->name}}</span></p>
                            
                                <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">{{$adminData->phone}}</span></p>
                            
                                <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">{{$adminData->email}}</span></p>
                            
                            </div>                                     
                        </div>                                 
                    </div> <!-- end card -->

                  

                </div> <!-- end col-->

                <div class="col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="tab-content">
                               

                                <div class="" id="settings">
                                    <form method="POST" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="name" value="{{$adminData->name}}" name="name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email"  value="{{$adminData->email}}" name="email">
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="username" value="{{$adminData->username}}" name="username">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Phone</label>
                                                    <input type="text" class="form-control" id="phone" name="phone" value="{{$adminData->phone}}">
                                                </div>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Profile Image</label>
                                                    <input type="file" name="photo" class="form-control" id="image">
                                                </div>
                                            </div>
                                            
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label"></label>
                                                    <img src="{{ (!empty($adminData->photo))? url('upload/user_images/'.$adminData->photo): url('upload/no_image.jpg')}}" class="rounded avatar-lg img-thumbnail" alt="profile-image" id="showImage">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div >
                                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Update Profile</button>
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

    <script type="text/javascript">
        
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }

                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection