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
                            <a href="{{route('all.news')}}" class="btn btn-success waves-effect waves-light">All News Post</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit News Post</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <form  method="POST" action="{{route('update.newspost')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="id" value="{{$post->id}}">
                                <div class="form-group col-md-12 mb-3">
                                    <label for="category" class="form-label">Category Name</label>
                                    <select class="form-select" name="category_id">
                                       

                                        @foreach($newscategory as $category)
                                        <option value="{{$category->id}}" {{ $category->id == $post->category_id? 'selected': ''}} >{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <label for="category" class="form-label">Sub Category Name</label>
                                    <select class="form-select" name="subcategory_id">
                                         <option></option>
                                        @foreach($newssubcategory as $subcategory)
                                        <option value="{{$subcategory->id}}" {{$subcategory->id == $post->subcategory_id? 'selected': ''}}>{{$subcategory->subcategory_name}}</option>
                                        @endforeach

                                        
                                    </select>
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <label for="category" class="form-label">Writter</label>
                                    <select class="form-select" name="user_id">
                                        <option></option>

                                        @foreach($adminuser as $writter)
                                        <option value="{{$writter->id}}" {{$writter->id == $post->user_id? 'selected': '' }}>{{$writter->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <label for="news_title" class="form-label">News Title</label>
                                    <input type="text" class="form-control @error('news_title') is-invalid @enderror" id="news_title" name="news_title"  value="{{$post->news_title}}">
                                    @error('news_title')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                 <div class="form-group col-md-12 mb-3">
                                    <label for="image" class="form-label">News Post Photo</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                   
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <label for="firstname" class="form-label"></label>
                                    <img src="{{ url(asset($post->image)) }}" class="rounded avatar-lg img-thumbnail" alt="newspost-image" id="showImage">
                                </div>

                                 <div class="form-group col-md-12 mb-3">
                                    <label for="news_details" class="form-label">News Details</label>
                                    <textarea class="form-control" name="news_details">{{$post->news_details}}</textarea>
                                     @error('news_details')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                   
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <label for="phone" class="form-label"> Tags</label>
                                    <input type="text" class="selectize-close-btn" name="tags" value="{{$post->tags}}">
                                    @error('tags')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-check mb-2 form-check-primary">
                                            <input type="checkbox" class="form-check-input"  name="breaking_news" id="check1" value="1" {{$post->breaking_news == 1? 'checked': ''}}>
                                            <label class="form-check-label" for="check1">Breaking News</label>
                                        </div>

                                        <div class="form-check mb-2 form-check-primary">
                                            <input type="checkbox" class="form-check-input" name="top_slider" id="check2" value="1" {{$post->top_slider == 1? 'checked': ''}}>
                                            <label class="form-check-label" for="check2">Top Slider</label>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-check mb-2 form-check-primary">
                                            <input type="checkbox" class="form-check-input"  name="first_section_three" id="check3" value="1" {{$post->first_section_three == 1? 'checked': ''}}>
                                            <label class="form-check-label" for="check3">First Section Three</label>
                                        </div>

                                        <div class="form-check mb-2 form-check-primary">
                                            <input type="checkbox" class="form-check-input"  name="first_section_nine" id="check4" value="1" {{$post->first_section_nine == 1? 'checked': ''}}>
                                            <label class="form-check-label" for="check4">First Section Nine</label>
                                        </div>

                                    </div>

                                    

                                </div>

                                
                                
                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update New post</button>

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
    $('select[name="category_id"]').on('change',function(){
        var category_id = $(this).val();
        if (category_id) {
            $.ajax({
                url: "{{ url('/subcategory/ajax')}}/"+ category_id,
                type: "GET",
                dataType:"json",
                success:function(data){
                    $('select[name="subcategory_id"]').html('');
                    $.each(data, function(key,value){
                        $('select[name="subcategory_id"]').append('<option value="'+value.id+'">'+value.subcategory_name+ '</option>');
                    });
                },
                error:function(jqXHR, textStatus, errorThrown){
                    console.log(textStatus, errorThrown);
                    alert("Error: " + textStatus);
                }
            });
        }else{
            alert('danger');
        }
    });
});

</script>



@endsection