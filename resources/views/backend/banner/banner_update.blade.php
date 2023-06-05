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
                            <!-- <a href="#" class="btn btn-blue waves-effect waves-light">Update Banner</a> -->
                        </ol>
                    </div>
                    <h4 class="page-title">Update Banner</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <form  method="POST" action="{{route('update.banner')}}" enctype="multipart/form-data">
                            @csrf
                            
                            <input type="hidden" name="id" value="{{$banner->id}}">
                            <div class="row">
                               

                                <div class="form-group col-md-6 mb-3">
                                    <label for="image" class="form-label">Home One Banner</label>
                                    <input type="file" class="form-control" id="image" name="home_one">
                                   
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="firstname" class="form-label"></label>
                                    <img src="{{(!empty($banner->home_one))? url($banner->home_one): url('upload/no_image.jpg')}}"  alt="banner-image" id="showImage" width="400px" height="60px">
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="image" class="form-label">Home Two Banner</label>
                                    <input type="file" class="form-control" id="image2" name="home_two">
                                   
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="firstname" class="form-label"></label>
                                    <img src="{{(!empty($banner->home_two))? url($banner->home_two): url('upload/no_image.jpg')}}"  alt="banner-image" id="showImage2" width="400px" height="60px">
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="image" class="form-label">Home Three Banner</label>
                                    <input type="file" class="form-control" id="image3" name="home_three">
                                   
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="firstname" class="form-label"></label>
                                    <img src="{{(!empty($banner->home_three))? url($banner->home_three): url('upload/no_image.jpg')}}"  alt="banner-image" id="showImage3" width="400px" height="60px">
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="image" class="form-label">Home Four Banner</label>
                                    <input type="file" class="form-control" id="image4" name="home_four">
                                   
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="firstname" class="form-label"></label>
                                    <img src="{{(!empty($banner->home_four))? url($banner->home_four): url('upload/no_image.jpg')}}"  alt="banner-image" id="showImage4" width="400px" height="60px">
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="image" class="form-label">News Category Banner</label>
                                    <input type="file" class="form-control" id="image5" name="news_category_one">
                                   
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="firstname" class="form-label"></label>
                                    <img src="{{(!empty($banner->news_category_one))? url($banner->news_category_one): url('upload/no_image.jpg')}}"  alt="banner-image" id="showImage5" width="400px" height="60px">
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="image" class="form-label">News Details Banner</label>
                                    <input type="file" class="form-control" id="image6" name="news_details_one">
                                   
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="firstname" class="form-label"></label>
                                    <img src="{{(!empty($banner->news_details_one))? url($banner->news_details_one): url('upload/no_image.jpg')}}"  alt="banner-image" id="showImage6" width="400px" height="60px">
                                </div>
                                
                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update Banner</button>

                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        
    </div>
     <!-- container -->

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

    $(document).ready(function(){
            $('#image2').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage2').attr('src',e.target.result);
                }

                reader.readAsDataURL(e.target.files['0']);
            });
        });

    $(document).ready(function(){
            $('#image3').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage3').attr('src',e.target.result);
                }

                reader.readAsDataURL(e.target.files['0']);
            });
        });

    $(document).ready(function(){
            $('#image4').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage4').attr('src',e.target.result);
                }

                reader.readAsDataURL(e.target.files['0']);
            });
        });

    $(document).ready(function(){
            $('#image5').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage5').attr('src',e.target.result);
                }

                reader.readAsDataURL(e.target.files['0']);
            });
        });

    $(document).ready(function(){
            $('#image6').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage6').attr('src',e.target.result);
                }

                reader.readAsDataURL(e.target.files['0']);
            });
        });
</script>

@endsection