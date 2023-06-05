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
                            <a href="{{route('all.category')}}" class="btn btn-success waves-effect waves-light">All Category</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Category</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <form  method="POST" action="{{route('category.store')}}">
                        	@csrf
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="category" class="form-label">Add Category</label>
                                    <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category" name="category_name" placeholder="Add category">
                                    @error('category_name')
                                    	<div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                
                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Add New Category</button>

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