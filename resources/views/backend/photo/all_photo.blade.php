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
                            @if(Auth::user()->can('photo.add'))
                            <a href="{{route('add.gallery')}}" class="btn btn-blue wave-effect wave-light">Add Photo</a>
                            @if(Auth::user()->can('photo.menu '))
                        </ol>
                    </div>
                    <h4 class="page-title">All Photo Gallery</h4>
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
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th>Action</th>      
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                            	@foreach ($photo as $key => $item)
                            		<tr>
                                    <td>{{$key+1}}</td>
                                    <td><img src="{{asset($item->photo_gallery)}}" width="50px" height="50px"></td>
                                    <td>{{$item->post_date}}</td>
                                    <td>
                                        @if(Auth::user()->can('photo.edit'))
                                    	<a href="{{route('edit.photo',$item->id)}}" class="btn btn-info btn-md" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        @endif
                                        @if(Auth::user()->can('photo.delete'))
                                    	<a href="{{route('delete.photo',$item->id)}}" class="btn btn-danger btn-md" id="delete"><i class="fas fa-trash-alt"></i></a>
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