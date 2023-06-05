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
                            <a href="{{route('all.subcategories')}}" class="btn btn-success waves-effect waves-light">All SubCategory</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Add SubCategory</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <form  method="POST" action="{{route('store.subcategory')}}">
                        	@csrf
                            <div class="row">
                                <div class="form-group col-md-8 mb-3">
                                    <label for="category" class="form-label">Select Category</label>
                                    <select class="form-select" name="category_id">
                                        <option>[select category]</option>

                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            
                            
                                <div class="form-group col-md-8 mb-3">
                                    <label for="subcategory" class="form-label">Add SubCategory</label>
                                    <input type="text" class="form-control @error('subcategory_name') is-invalid @enderror" id="category" name="subcategory_name" placeholder="Add Subcategory">
                                    @error('subcategory_name')
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