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
                            <!-- <a href="{{route('add.video')}}" class="btn btn-success waves-effect waves-light">Add Video</a> -->
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Video</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <form  method="POST" action="{{route('store.live.tv')}}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{$tvid->id}}">
                            <div class="row">

                                 <div class="form-group col-md-12 mb-3">
                                    <label for="news_title" class="form-label">Live TV URL</label>
                                    <input type="text" class="form-control @error('live_url') is-invalid @enderror" id="news_title" name="live_url"  value="{{$tvid->live_url}}">
                                    @error('live_url')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                 <div class="form-group col-md-12 mb-3">
                                    <label for="image" class="form-label">Live TV Image</label>
                                    <input type="file" class="form-control" id="image" name="live_image">
                                   
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <label for="firstname" class="form-label"></label>
                                    <img src="{{ (!empty($tvid->live_image))?asset($tvid->live_image):url('upload/no_image.jpg')}}" class="rounded avatar-lg img-thumbnail" alt="newspost-image" id="showImage">
                                </div>                                
                                
                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update Live TV</button>

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

</script>
@endsection