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
                            <!-- <a href="{{route('add.video')}}" class="btn btn-success waves-effect waves-light">Add Video</a> -->
                        </ol>
                    </div>
                    <h4 class="page-title">SEO SETTINGS</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <form  method="POST" action="{{route('update.seo')}}">
                            @csrf

                            <input type="hidden" name="id" value="{{$seo->id}}">
                            <div class="row">

                                 <div class="form-group col-md-12 mb-3">
                                    <label for="news_title" class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" id="news_title" name="meta_title"  value="{{$seo->meta_title}}">
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <label for="news_title" class="form-label">Meta Author</label>
                                    <input type="text" class="form-control" id="news_title" name="meta_author"  value="{{$seo->meta_author}}">
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <label for="news_title" class="form-label">Meta Keyword</label>
                                    <input type="text" class="selectize-close-btn" id="news_keyword" name="meta_keyword"  value="{{$seo->meta_keyword}}">
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <label for="news_title" class="form-label">Meta description</label>
                                    <input type="text" class="form-control" id="news_keyword" name="meta_description"  value="{{$seo->meta_description}}">
                                </div>


                                                                
                                
                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update SEO </button>

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