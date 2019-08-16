<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i>Users<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="/admin/users/">All Users</a>
                    </li>

                    <li>
                        <a href="/admin/users/create">Create User</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin.posts.index')}}">All Posts</a>
                    </li>

                    <li>
                        <a href="{{route('admin.posts.create')}}">Create Post</a>
                    </li>

                    <li>
                        <a href="{{route('admin.comments.index')}}">All Comment</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>


            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i>Categories<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin.categories.index')}}">All Categories</a>
                    </li>

                    <li>
                        <a href="{{route('admin.categories.create')}}">Create Category</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>


            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i>Media<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin.medias.index')}}">All Media</a>
                    </li>

                    <li>
                        <a href="{{route('admin.medias.create')}}">Upload Media</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>

        </ul>


    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->