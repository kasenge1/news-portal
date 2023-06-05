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
                            
                            <a href="{{route('add.admin')}}" class="btn btn-blue wave-effect wave-light">Add Admin</a>
                        </ol>
                    </div>
                    <h4 class="page-title">All Admin <span class="btn btn-danger">{{count($alladmins)}}</span></h4>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Action</th>      
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                            	@foreach ($alladmins as $key => $item)
                            		<tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td><img src="{{(!empty($item->photo))?url(asset('upload/user_images/'.$item->photo)):url('upload/no_image.jpg')}}" width="50" height="50" alt="photo"></td>
                                    <td>
                                        
                                        @if($item->status == 'active')
                                        <span class="badge badge-pill bg-success">Active</span>
                                        @else
                                        <span class="badge badge-pill bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @foreach($item->roles as $role)
                                            <span class="badge badge-pill bg-primary">{{$role->name}}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                    	<a href="{{route('edit.admin',$item->id)}}" class="btn btn-info btn-md" title="Edit Data"><i class="fas fa-edit"></i></a>
                                    	<a href="{{route('delete.admin',$item->id)}}" class="btn btn-danger btn-md" id="delete"><i class="fas fa-trash-alt"></i></a>

                                        @if($item->status == 'active')
                                           <a href="{{route('deactivate.admin',$item->id)}}" class="btn btn-danger btn-md" title="Deactivate"><i class="fas fa-solid fa-thumbs-down"></i></a> 
                                        @else
                                            <a href="{{route('activate.admin',$item->id)}}" class="btn btn-info btn-md" title="Activate"><i class="fas fa-solid fa-thumbs-up"></i></a>
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