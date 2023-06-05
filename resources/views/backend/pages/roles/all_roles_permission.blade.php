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
                            
                            <a href="{{route('add.roles.permission')}}" class="btn btn-blue wave-effect wave-light">Add Roles Permission</a>
                        </ol>
                    </div>
                    <h4 class="page-title">All Roles Permission</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                      

                        <table  class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>S1</th>
                                    <th width="15%">Role Name</th>
                                    <th>Permissions</th>
                                    <th width="18%">Action</th>      
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                            	@foreach ($roles as $key => $item)
                            		<tr>
                                    <td>{{$key+1}}</td>
                                    <td width="15%">{{$item->name}}</td>
                                    <td>
                                        @foreach($item->permissions as $perm)
                                            <span class="badge rounded-pill bg-danger">{{$perm->name}}</span>
                                        @endforeach
                                    </td>
                                    <td width="18%">
                                    	<a href="{{route('edit.role.permission',$item->id)}}" class="btn btn-info btn-md" title="Edit Data"><i class="fas fa-edit"></i></a>
                                    	<a href="{{route('delete.role.permission',$item->id)}}" class="btn btn-danger btn-md" id="delete"><i class="fas fa-trash-alt"></i></a>
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