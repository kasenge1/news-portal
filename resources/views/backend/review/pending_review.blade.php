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
                        
                        </ol>
                    </div>
                    <h4 class="page-title">Pending Reviews <span class="btn btn-danger">{{count($pendingreview)}}</span></h4>
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
                                    <th>News ID</th>
                                    <th>User ID</th>
                                    <th>Comment</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th>Action</th>      
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                @foreach ($pendingreview as $key => $item)
                                    <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->news->news_title}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{Str::limit($item->comment,25)}}</td>
                                    <td>{{$item->created_at}}</td>                                        
                                    <td> <span class="badge badge-pill bg-danger">Pending</span></td>
                                       
                                
                                    <td>
                                                                              
                                        <a href="{{route('activate.review',$item->id)}}" class="btn btn-info btn-md" title="Activate">Approve</a>
                                      
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