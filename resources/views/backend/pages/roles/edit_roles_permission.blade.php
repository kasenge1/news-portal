@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<style type="text/css">
    .form-check-label{
        text-transform: capitalize;
    }
</style>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{route('add.roles.permission')}}" class="btn btn-success waves-effect waves-light">Add Roles in permission</a> 
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Roles In Permission</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <form  method="POST" action="{{route('update.roles.permission')}}">
                        	@csrf

                            <input type="hidden" name="id" value="{{$role->id}}">
                            <div class="row">
                                <div class="form-group col-md-8 mb-3">
                                    <label for="" class="form-label">All Roles</label>
                                    <h4>{{$role->name}}</h4>
                                </div>
                                
                            </div>

                            
                            <div class="form-check mb-2 form-check-primary">
                                <input type="checkbox" class="form-check-input" id="customebox15">
                                <label class="form-check-label" for="customebox15">Select All Permissions</label>
                            </div>
                         

                            <hr/>

                            @foreach($permission_group as $group)
                            <div class="row">

                                @php
                                    $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                                @endphp

                                <div class="col-3">
                                    <div class="form-check mb-2 form-check-primary">
                                        <input type="checkbox" name="" class="form-check-input" id="check1"  {{ App\Models\User::roleHasPermissions($role,$permissions)? 'checked':''}}>
                                        <label class="form-check-label" for="check1">{{$group->group_name}}</label>
                                    </div>
                                </div>

                                <div class="col-9">

                                    
                                    @foreach($permissions as $permission)
                                    <div class="form-check mb-2 form-check-primary">
                                        <input type="checkbox" name="permission[]" {{$role->hasPermissionTo($permission->name)?'checked':''}} class="form-check-input" value="{{$permission->id}}"  id="customecheck{{$permission->id}}">
                                        <label class="form-check-label" for="">{{$permission->name}}</label>
                                    </div>
                                    @endforeach
                                    <br>
                                </div>
                            </div>

                            @endforeach

                            <button type="submit" class="btn btn-primary waves-effect waves-light">save Chenges</button>

                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        
    </div>
     <!-- container -->

</div>
<script type="text/javascript">
    $('#customebox15').click(function(){
        if ($(this).is(':checked')) {
            $('input[type = checkbox]').prop('checked',true);
        }else{
           $('input[type = checkbox]').prop('checked',false); 
        }
    });
</script>

@endsection