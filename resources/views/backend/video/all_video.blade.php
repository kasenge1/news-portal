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
                            @if(Auth::user()->can('video.add '))
                            <a href="{{route('add.video')}}" class="btn btn-blue wave-effect wave-light">Add Video</a>
                            @endif
                        </ol>
                    </div>
                    <h4 class="page-title">All Video Gallery</h4>
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
                                    <th>Video Image</th>
                                    <th>Video Title</th>
                                    <th>Date</th>
                                    <th>Action</th>      
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                            	@foreach ($video as $key => $item)
                            		<tr>
                                    <td>{{$key+1}}</td>
                                    <td><img src="{{asset($item->video_image)}}" width="50px" height="50px"></td>
                                    <td>{{$item->video_title}}</td>
                                    <td>{{$item->post_date}}</td>
                                    <td>
                                        @if(Auth::user()->can('video.edit '))
                                    	<a href="{{route('edit.video',$item->id)}}" class="btn btn-info btn-md" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        @endif
                                        @if(Auth::user()->can('video.delete '))
                                    	<a href="{{route('delete.video',$item->id)}}" class="btn btn-danger btn-md" id="delete"><i class="fas fa-trash-alt"></i></a>
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