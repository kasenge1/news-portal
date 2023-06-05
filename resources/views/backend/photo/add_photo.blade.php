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
                    <h4 class="page-title">Add Gallery</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <form  method="POST" action="{{route('store.gallery')}}" enctype="multipart/form-data">
                            @csrf
                            
                            <input type="hidden" name="id" value="">
                            <div class="row">
                               

                                <div class="form-group col-md-8 mb-3">
                                    <label for="image" class="form-label">Add Photos</label>
                                    <input type="file" class="form-control" id="multiImg" name="multi_image[]" multiple><br>

                                    <div class="row" id="preview_img" ></div>
                                   
                                </div>                              
                                
                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Add Gallery</button>

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
		   $('#multiImg').on('change', function(){ //on file input change
		      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
		      {
		          var data = $(this)[0].files; //this file data
		           
		          $.each(data, function(index, file){ //loop though each file
		              if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
		                  var fRead = new FileReader(); //new filereader
		                  fRead.onload = (function(file){ //trigger function on successful read
		                  return function(e) {
		                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
		                  .height(80); //create image element 
		                      $('#preview_img').append(img); //append image to output element
		                  };
		                  })(file);
		                  fRead.readAsDataURL(file); //URL representing the file's data.
		              }
		          });
		           
		      }else{
		          alert("Your browser doesn't support File API!"); //if File API is absent
		      }
		   });
		  });

    
</script>

@endsection