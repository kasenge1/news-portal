@php
$id = Auth::user()->id;
$userid = App\Models\User::find($id);
$status = $userid->status;

@endphp

<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{asset('backend/assets/images/users/user-1.jpg')}}" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="#sidebarDashboards" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="badge bg-success rounded-pill float-end"></span>
                        <span>Dashboards</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('admin.dashboard')}}">Home</a>
                            </li>
                            
                        </ul>
                    </div>
                   
                </li>
                @if($status == 'active' )

                <li class="menu-title mt-2">Menu</li>

                @if(Auth::user()->can('category.menu'))
                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            @if(Auth::user()->can('category.list'))
                            <li>
                                <a href="{{route('all.category')}}">All Category</a>
                            </li>
                            @endif
                            @if(Auth::user()->can('category.add'))
                            <li>
                                <a href="{{route('add.category')}}">Add Category</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif

                @if(Auth::user()->can('subcategory.menu'))
                <li>
                    <a href="#sidebarCrm" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> Sub-Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                           @if(Auth::user()->can('subcategory.list'))
                            <li>
                                <a href="{{route('all.subcategories')}}">All Sub-Category</a>
                            </li>
                            @endif
                            @if(Auth::user()->can('subcategory.add'))
                            <li>
                                <a href="{{route('add.subcategories')}}">Add Sub-Category</a>
                            </li>
                            @endif
                            
                        </ul>
                    </div>
                </li>
                @endif

               @if(Auth::user()->can('news.menu'))
                <li>
                    <a href="#sidebarCrm1" data-bs-toggle="collapse">
                        <i class="mdi mdi-newspaper-variant-outline"></i>
                        <span> News Post </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm1">
                        <ul class="nav-second-level">
                            @if(Auth::user()->can('news.list'))
                            <li>
                                <a href="{{route('all.news')}}">All News Post</a>
                            </li>
                            @endif
                            @if(Auth::user()->can('news.add'))
                            <li>
                                <a href="{{route('add.newspost')}}">Add News Post</a>
                            </li>
                           @endif
                        </ul>
                    </div>
                </li>
                @endif
                @if(Auth::user()->can('photo.menu'))
                <li>
                    <a href="#sidebarEmail" data-bs-toggle="collapse">
                        <i class="mdi mdi-image-plus"></i>
                        <span> Photo Gallary Setting </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEmail">
                        <ul class="nav-second-level">
                            @if(Auth::user()->can('photo.list'))
                            <li>
                                <a href="{{route('photo.gallary')}}">Photo Gallery</a>
                            </li> 
                            @endif                    
                        </ul>
                    </div>
                </li>
                @endif

               @if(Auth::user()->can('video.menu'))
                <li>
                    <a href="#video" data-bs-toggle="collapse">
                        <i class="mdi mdi-image-plus"></i>
                        <span> video Gallary Setting </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="video">
                        <ul class="nav-second-level">
                            @if(Auth::user()->can('video.list'))
                            <li>
                                <a href="{{route('video.gallary')}}">Video Gallery</a>
                            </li>  
                            @endif                   
                        </ul>
                    </div>
                </li>
                @endif

                @if(Auth::user()->can('live.menu'))
                <li>
                    <a href="#livetv" data-bs-toggle="collapse">
                        <i class="mdi mdi-image-plus"></i>
                        <span> Live TV Setting </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="livetv">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('update.live.tv')}}">Update Live Tv</a>
                            </li>                            
                        </ul>
                    </div>
                </li>
                @endif
               @if(Auth::user()->can('review.menu'))
                <li>
                    <a href="#review" data-bs-toggle="collapse">
                        <i class="mdi mdi-image-plus"></i>
                        <span> Review Setting </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="review">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('pending.review')}}">Pending Review</a>
                            </li>  
                            <li>
                                <a href="{{route('approved.review')}}">Approved Review</a>
                            </li>                           
                        </ul>
                    </div>
                </li>
                @endif
                @if(Auth::user()->can('seo.menu'))
                <li>
                    <a href="#seo" data-bs-toggle="collapse">
                        <i class="mdi mdi-image-plus"></i>
                        <span> SEO Setting </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="seo">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('seo.setting')}}">Update SEO</a>
                            </li>  
                                                      
                        </ul>
                    </div>
                </li>
               @endif

               @if(Auth::user()->can('setting.menu'))
                <li class="menu-title mt-2">Settings</li>
                
                <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-settings"></i>
                        <span> Setting admin users </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('all.admin')}}">All admin</a>
                            </li>
                            <li>
                                <a href="{{route('add.admin')}}">Add admin</a>
                            </li>
                        </ul>
                    </div>
                </li>
               @endif
               @if(Auth::user()->can('banner.menu'))
                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span> Banner Settings </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                           
                            <li>
                                <a href="{{route('all.banner')}}">All Banners</a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                @endif
                
                @if(Auth::user()->can('role.menu'))
                <li>
                    <a href="#permission" data-bs-toggle="collapse">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span> Permission Settings </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="permission">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('all.permission')}}">All Permission</a>
                            </li>

                            <li>
                                <a href="{{route('all.roles')}}">All Roles</a>
                            </li>

                            <li>
                                <a href="{{route('add.roles.permission')}}">Roles in permission</a>
                            </li>

                            <li>
                                <a href="{{route('all.roles.permission')}}">All Roles in permission</a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                @endif
                @else

                @endif

                <li class="menu-title mt-2">Components</li>

                <li>
                    <a href="#sidebarIcons" data-bs-toggle="collapse">
                        <i class="mdi mdi-bullseye"></i>
                        <span> Icons </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarIcons">
                        <ul class="nav-second-level">
                            <li>
                                <a href="icons-material-symbols.html">Material Symbols Icons</a>
                            </li>
                            <li>
                                <a href="icons-two-tone.html">Two Tone Icons</a>
                            </li>
                            
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarForms" data-bs-toggle="collapse">
                        <i class="mdi mdi-bookmark-multiple-outline"></i>
                        <span> Forms </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarForms">
                        <ul class="nav-second-level">
                            <li>
                                <a href="forms-elements.html">General Elements</a>
                            </li>
                            <li>
                                <a href="forms-advanced.html">Advanced</a>
                            </li>
                        </ul>
                    </div>
                </li>
                
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

    </div>