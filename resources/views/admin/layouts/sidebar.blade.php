<nav class="sidebar">
    <nav class="sidebar-menu">
        <ul class="nav flex-column">
            <li class="nav-item">
                <div class="user-info">
                    <div class="image">
                        <img src="{{asset('admin/images/user.png')}}" width="48" height="48" alt="User">
                    </div>
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
                        <div class="email">{{Auth::user()->email}}</div>
                    </div>
                </div>
            </li>
            <li class="main-navigation">
                Main Navigation
            </li>
            @can('dashboard')
                <li class="nav-item mt-2 waves-effect">
                    <a class="nav-link" aria-current="page" href="{{route('dashboard')}}">
                        <span>Home</span>
                    </a>
                </li>
            @endcan
            @canany(['permission-group-list','permission-group-create'])
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect" href="#" id="permission_group" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span>
                        Permission Group
                    </span>
                        <i class="fa fa-plus"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="permission_group">
                        @can('permission-group-create')
                            <li><a class="dropdown-item" href="{{route('permission_group.create')}}">Add New</a></li>
                        @endcan
                        @can('permission-group-list')
                            <li><a class="dropdown-item" href="{{route('permission_group.index')}}">View All</a></li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['permission-list','permission-create'])
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect" href="#" id="permission" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span>
                        Permission
                    </span>
                        <i class="fa fa-plus"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="permission">
                        @can('permission-create')
                            <li><a class="dropdown-item" href="{{route('permission.create')}}">Add New</a></li>
                        @endcan
                        @can('permission-list')
                            <li><a class="dropdown-item" href="{{route('permission.index')}}">View All</a></li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['role-list','role-create'])
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect" href="#" id="permission" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span>
                        Role
                    </span>
                        <i class="fa fa-plus"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="permission">
                        @can('role-create')
                            <li><a class="dropdown-item" href="{{route('role.create')}}">Add New</a></li>
                        @endcan
                        @can('role-list')
                            <li><a class="dropdown-item" href="{{route('role.index')}}">View All</a></li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['user-list','user-create'])
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect" href="#" id="user" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span>
                        Users
                    </span>
                        <i class="fa fa-plus"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="user">
                        @can('user-create')
                            <li><a class="dropdown-item" href="{{route('user.create')}}">Add New</a></li>
                        @endcan
                        @can('user-list')
                            <li><a class="dropdown-item" href="{{route('user.index')}}">View All</a></li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['news-event-list','news-event-create'])
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect" href="#" id="news-event" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span>
                        News & Events
                    </span>
                        <i class="fa fa-plus"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="news-event">
                        @can('news-event-create')
                            <li><a class="dropdown-item" href="{{route('news-event.create')}}">Add New</a></li>
                        @endcan
                        @can('news-event-list')
                            <li><a class="dropdown-item" href="{{route('news-event.index')}}">View All</a></li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['research-publication-list','research-publication-create'])
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect" href="#" id="researches" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span>
                        Research & Publications
                    </span>
                        <i class="fa fa-plus"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="researches">
                        @can('research-publication-create')
                            <li><a class="dropdown-item" href="{{route('research-publication.create')}}">Add New</a></li>
                        @endcan
                        @can('research-publication-list')
                            <li><a class="dropdown-item" href="{{route('research-publication.index')}}">View All</a></li>
                        @endcan
                    </ul>
                </li>
            @endcanany
            @canany(['link_type-list','link_type-create'])
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect" href="#" id="link_type" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span>
                    Link Type
                </span>
                    <i class="fa fa-plus"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="link_type">
                    @can('link_type-create')
                        <li><a class="dropdown-item" href="{{route('link_type.create')}}">Add New</a></li>
                    @endcan
                    @can('link_type-list')
                        <li><a class="dropdown-item" href="{{route('link_type.index')}}">View All</a></li>
                    @endcan
                </ul>
            </li>
        @endcanany
        @canany(['link-list','link-create'])
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect" href="#" id="link" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span>
                    Link
                </span>
                    <i class="fa fa-plus"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="link">
                    @can('link-create')
                        <li><a class="dropdown-item" href="{{route('link.create')}}">Add New</a></li>
                    @endcan
                    @can('link-list')
                        <li><a class="dropdown-item" href="{{route('link.index')}}">View All</a></li>
                    @endcan
                </ul>
            </li>
        @endcanany
        @canany(['success_story-list','success_story-create'])
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle waves-effect" href="#" id="success_story" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span>
                Success Stories
            </span>
                <i class="fa fa-plus"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="success_story">
                @can('success_story-create')
                    <li><a class="dropdown-item" href="{{route('success_story.create')}}">Add New</a></li>
                @endcan
                @can('success_story-list')
                    <li><a class="dropdown-item" href="{{route('success_story.index')}}">View All</a></li>
                @endcan
            </ul>
        </li>
    @endcanany
        </ul>
    </nav>
</nav>
