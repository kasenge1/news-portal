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
                            <a href="{{route('all.permission')}}" class="btn btn-success waves-effect waves-light">All permission</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Permission</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <form  method="POST" action="{{route('store.permission')}}">
                        	@csrf

                            <div class="form-group col-md-8 mb-3">
                                <label for="pname" class="form-label">Permission Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="pname" name="name" placeholder="Permission Name">
                                @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="form-group col-md-8 mb-3">
                                    <label for="" class="form-label">Select Category</label>
                                    <select class="form-select" name="group_name">
                                        <option>--select Permission--</option>

                                        <option value="category">Category</option>
                                        <option value="subcategory">SubCategory</option>
                                        <option value="news">News</option>
                                        <option value="banner">Banner</option>
                                        <option value="photo">Photo</option>
                                        <option value="video">Video</option>
                                        <option value="live">Live</option>
                                        <option value="review">Review</option>
                                        <option value="seo">SEO</option>
                                        <option value="admin">Admin Settings</option>
                                        <option value="role">Role and Permission</option>

                                 
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