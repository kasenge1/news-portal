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
                            
                            <a href="{{route('add.subcategories')}}" class="btn btn-blue wave-effect wave-light">Add SubCategory</a>
                        </ol>
                    </div>
                    <h4 class="page-title">All SubCategories</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                      

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>S1</th>
                                    <th>Category Id</th>
                                    <th>SubCategory Name</th>
                                    <th>Action</th>      
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                            	@foreach ($subcategories as $key => $item)
                            		<tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item['category']['category_name']}}</td>
                                    <td>{{$item->subcategory_name}}</td>
                                    <td>
                                        @if(Auth::user()->can('subcategory.edit'))
                                    	<a href="{{route('edit.subcategories',$item->id)}}" class="btn btn-info btn-md" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        @endif
                                        @if(Auth::user()->can('subcategory.delete'))
                                    	<a href="{{route('delete.subcategory',$item->id)}}" class="btn btn-danger btn-md" id="delete"><i class="fas fa-trash-alt"></i></a>
                                        @endif
                                    </td>
                                    
                                </tr>
                            	@endforeach
                                
                             
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
        
    </div> 
    <!-- container -->

</div>


@endsection