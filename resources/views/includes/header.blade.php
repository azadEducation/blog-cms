
<nav class="navbar navbar-expand-lg navbar-default">
    <div class="container-fluid px-0">
        <a class="navbar-brand" href="{{route('blogIndex')}}"><img src="assets/images/brand/logo/logo.svg" alt="" /></a>
        <div>     
        <a class="btn btn-primary me-2 me-lg-0" href="{{route('login')}}">Login</a>
             <a class="btn btn-outline-primary me-2 me-lg-0" href="{{route('registerIndex')}}">Register</a>
             </div>
        @if (Auth::check())
        <ul class="navbar-nav navbar-right-wrap ms-auto d-lg-none d-flex nav-top-wrap">
            
            <li class="dropdown ms-2">
                <a class="rounded-circle" href="#" role="button" data-bs-toggle="dropdown">
                    <div class="avatar avatar-md avatar-indicators avatar-online">
                        <img alt="avatar" src="assets/images/avatar/avatar-1.jpg" class="rounded-circle" />
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow">
                    <div class="dropdown-item">
                        <div class="d-flex">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                <img alt="avatar" src="assets/images/avatar/avatar-1.jpg" class="rounded-circle" />
                            </div>
                            <div class="ms-3 lh-1">
                                <h5 class="mb-1">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h5>
                                <p class="mb-0 text-muted">{{Auth::user()->email}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled">
                        <li>
                            <a class="dropdown-item" href="index.html">
                                <i class="fe fe-power me-2"></i>Sign Out
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        @endif
    </div>
</nav>
