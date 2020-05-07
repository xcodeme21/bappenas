<header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header border-right">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <a class="navbar-brand" href="{{ route('dashboard') }}">
                        <b class="logo-icon">
                            <span><img src="{{ asset('public/img/logo.png') }}" width="50px" /></span>
                        </b>
                    </a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-18"></i></a></li>

                        


                    </ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('public/img/people.png') }}" alt="user" class="rounded-circle" width="36">
                                <span class="ml-2 font-medium">{{ Auth::user()->nama }}</span><span class="fas fa-angle-down ml-2"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <div class="d-flex no-block align-items-center p-3 mb-2 border-bottom">
                                    <div class=""><img src="{{ asset('public/img/people.png') }}" alt="user" class="rounded" width="80"></div>
                                    <div class="ml-2">
                                        <h4 class="mb-0">{{ Auth::user()->nama }}</h4>
                                        <p class=" mb-0 text-muted">{{ Auth::user()->email }}</p>
                                        <!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger text-white mt-2 btn-rounded">View Profile</a> -->
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"data-toggle="tooltip" title="Keluar dari sistem" data-placement="left" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark profile-dd" href="javascript:void(0)" aria-expanded="false">
                                <img src="{{ asset('public/img/people.png') }}" class="rounded-circle ml-2" width="30">
                                <span class="hide-menu">{{ Auth::user()->nama }}</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                                <i class="mdi mdi-av-timer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        @if(Auth::user()->id_level == 1)
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('user') }}" aria-expanded="false">
                                <i class="mdi mdi-account"></i>
                                <span class="hide-menu">Data User</span>
                            </a>
                        </li>

                        
                        @elseif(Auth::user()->id_level == 2)
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-pen"></i>
                                <span class="hide-menu">Input</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('surat-masuk') }}" class="sidebar-link">
                                        <i class="mdi mdi-emoticon"></i>
                                        <span class="hide-menu"> Surat Masuk </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('surat-keluar') }}" class="sidebar-link">
                                        <i class="mdi mdi-emoticon"></i>
                                        <span class="hide-menu"> Surat Keluar </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                       
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>