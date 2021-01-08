@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{('/home')}}" class="brand-link">
        <img src="{{asset('backend')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{(!empty(Auth::user()->image))?url(Auth::user()->image):url('backend/upload/02.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <ul class="nav nav-treeview">
                        @if(Auth::user()->usertype == 'Admin')
                        <li class="nav-item has-treeview {{($prefix=='/user')?'menu-open':''}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Manage User
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('users_view')}}" class="nav-link {{($route=='users_view')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View User</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        <li class="nav-item has-treeview {{($prefix=='/profile')?'menu-open':''}}">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Manage Profile
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview {{($prefix=='/profile')?'menu-open':''}}">
                                <li class="nav-item">
                                    <a href="{{route('profile.view')}}" class="nav-link {{($route=='profile.view')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Your Profile</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview {{($prefix=='/profile')?'menu-open':''}}">
                                <li class="nav-item">
                                    <a href="{{route('change.password')}}" class="nav-link {{($route=='change.password')?'active':''}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Change Password</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                            <li class="nav-item has-treeview {{($prefix=='/logo')?'menu-open':''}}">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Manage Logo
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('view.logo')}}" class="nav-link {{($route=='view.logo')?'active':''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View Logo</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview {{($prefix=='/slider')?'menu-open':''}}">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Manage Slider
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('view.slider')}}" class="nav-link {{($route=='view.slider')?'active':''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View Slider</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview {{($prefix=='/contact')?'menu-open':''}}">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Manage Contact
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('view.contact')}}" class="nav-link {{($route=='view.contact')?'active':''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View Contact</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('view.communication')}}" class="nav-link {{($route=='view.communication')?'active':''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View Communication</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview {{($prefix=='/category')?'menu-open':''}}">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Manage Category
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('view_category')}}" class="nav-link {{($route=='view_category')?'active':''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View Category</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview {{($prefix=='/brand')?'menu-open':''}}">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Manage Brand
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('view_brand')}}" class="nav-link {{($route=='view_brand')?'active':''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View Brand</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview {{($prefix=='/color')?'menu-open':''}}">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Manage Color
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('view_color')}}" class="nav-link {{($route=='view_color')?'active':''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View Color</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview {{($prefix=='/size')?'menu-open':''}}">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Manage Size
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('view_size')}}" class="nav-link {{($route=='view_size')?'active':''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View Size</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview {{($prefix=='/product')?'menu-open':''}}">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Manage Product
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('view_product')}}" class="nav-link {{($route=='view_product')?'active':''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>View Product</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                    </ul>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
