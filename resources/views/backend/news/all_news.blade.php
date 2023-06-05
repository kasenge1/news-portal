@extends('admin.admin_dashboard')
@section('admin')

@php
    
    $activenews = App\Models\Newspost::where('status',1)->get();
    $inactivenews = App\Models\Newspost::where('status',0)->get();
    $breakingnews = App\Models\Newspost::where('breaking_news',1)->get();
    $activenews = App\Models\Newspost::where('status',1)->get();

@endphp

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            
                            <a href="{{route('add.newspost')}}" class="btn btn-blue wave-effect wave-light">Add News Post</a>
                        </ol>
                    </div>
                    <h4 class="page-title">All News Post</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

           <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                                        <i class="fe-heart font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{count($allnews)}}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">All News Post</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                        <i class="fe-thumbs-up font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{count($activenews)}}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Active News Post</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-danger border-info border shadow">
                                        <i class="fe-thumbs-down font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-danger mt-1"><span data-plugin="counterup">{{count($inactivenews)}}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Inactive News Post</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                                        <i class="fe-eye font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{count($breakingnews)}}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Breaking News</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                      

                        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>S1</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>      
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                @foreach ($allnews as $key => $item)
                                    <tr>
                                    <td>{{$key+1}}</td>
                                    
                                    <td><img src="{{(!empty($item->image))?url(asset($item->image)): url('upload/no_image.jpg')}}" width="50" height="50" alt="photo"></td>
                                    </td>
                                    <td>{{Str::limit($item->news_title,20)}}</td>
                                    <td>{{$item['category']['category_name']}}</td>
                                    <td>{{$item['user']['username']}}</td>
                                    <td>{{$item->post_date}}</td>
                                    <td>
                                        @if($item->status == 1)
                                        <span class="badge badge-pill bg-success">Active</span>
                                        @else
                                        <span class="badge badge-pill bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(Auth::user()->can('news.edit'))
                                        <a href="{{route('edit.news.post',$item->id)}}" class="btn btn-info btn-md" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        @endif
                                        @if(Auth::user()->can('news.delete'))
                                        <a href="{{route('delete.news.post',$item->id)}}" class="btn btn-danger btn-md" id="delete"><i class="fas fa-trash-alt"></i></a>
                                        @endif
                                        @if($item->status == 1)
                                           <a href="{{route('deactivate.post',$item->id)}}" class="btn btn-danger btn-md" title="Deactivate"><i class="fas fa-solid fa-thumbs-down"></i></a> 
                                        @else
                                            <a href="{{route('activate.post',$item->id)}}" class="btn btn-info btn-md" title="Activate"><i class="fas fa-solid fa-thumbs-up"></i></a>
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