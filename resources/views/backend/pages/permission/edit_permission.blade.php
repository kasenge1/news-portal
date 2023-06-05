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
                            <a href="{{route('add.permission')}}" class="btn btn-success waves-effect waves-light">Add permission</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Permission</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <form  method="POST" action="{{route('update.permission')}}">
                        	@csrf

                            <input type="hidden" name="id" value="{{$permission->id}}">
                            <div class="form-group col-md-8 mb-3">
                                <label for="pname" class="form-label">Permission Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="pname" name="name" value="{{$permission->name}}">
                                @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="form-group col-md-8 mb-3">
                                    <label for="" class="form-label">Select Category</label>
                                    <select class="form-select" name="group_name">
                                        <option>--select Permission--</option>

                                        <option value="category" {{$permission->group_name == 'category'?'selected':''}}>Category</option>
                                        <option value="subcategory" {{$permission->group_name == 'subcategory'?'selected':''}}>SubCategory</option>
                                        <option value="news" {{$permission->group_name == 'news'?'selected':''}}>News</option>
                                        <option value="banner" {{$permission->group_name == 'banner'?'selected':''}}>Banner</option>
                                        <option value="photo" {{$permission->group_name == 'photo'?'selected':''}}>Photo</option>
                                        <option value="video" {{$permission->group_name == 'video'?'selected':''}}>Video</option>
                                        <option value="live" {{$permission->group_name == 'live'?'selected':''}}>Live</option>
                                        <option value="review" {{$permission->group_name == 'review'?'selected':''}}>Review</option>
                                        <option value="seo" {{$permission->group_name == 'seo'?'selected':''}}>SEO</option>
                                        <option value="admin" {{$permission->group_name == 'admin'?'selected':''}}>Admin Settings</option>
                                        <option value="role" {{$permission->group_name == 'role'?'selected':''}}>Role and Permission</option>

                                 
                                    </select>
                                </div>
                                
                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Add Permission</button>

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