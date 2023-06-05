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
                    <h4 class="page-title">Approved Reviews <span class="btn btn-success">{{count($approvedreview)}}</span></h4>
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
                                @foreach ($approvedreview as $key => $item)
                                    <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->news->news_title}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->comment}}</td>
                                    <td>{{$item->created_at}}</td>                                        
                                    <td> <span class="badge badge-pill bg-success">Aproved</span></td>
                                       
                                
                                    <td>
                                                                       
                                        <a href="{{route('delete.review',$item->id)}}" class="btn btn-danger btn-md" title="Activate" id="delete"><i class="fas fa-trash-alt"></i></a>
                                      
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