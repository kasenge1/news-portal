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
                                
                                <a href="{{route('photo.gallary')}}" class="btn btn-blue wave-effect wave-light">Add Photo</a>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Gallery</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="tab-content">
                               

                                <div class="" id="settings">
                                    <form method="POST" action="{{route('update.photo')}}" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="id" value="{{$photogal->id}}">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Photo Gallery</label>
                                                    <input type="file" name="photo" class="form-control" id="image">
                                                </div>
                                            </div>
                                            
                                        </div> <!-- end row -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label"></label>
                                                    <img src="{{ asset($photogal->photo_gallery)}}" width="100px" height="60px" alt="profile-image" id="showImage">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div >
                                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Update Gallery</button>
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