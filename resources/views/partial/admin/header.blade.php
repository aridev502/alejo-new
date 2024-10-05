<nav class="navbar p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
        <a class="navbar-brand brand-logo-mini" href="{{route('home')}}"><img src="{{asset('logos/main.png')}}" style="    width: 260%;
    height: 120%;
    border-radius: 68px;" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">

            <li class="nav-item nav-settings d-none d-lg-block">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                </a>
            </li>



            <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                    <div class="navbar-profile">
                        <?php

                        $email = \Auth::user()->email;
                        $default = "https://www.somewhere.com/homestar.jpg";
                        $size = 40;

                        $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . urlencode($default) . "&s=" . $size;
                        ?>
                        <img class="img-xs rounded-circle" src="{{$grav_url}}" alt="">
                        <p class="mb-0 d-none d-sm-block navbar-profile-name">{{Auth::user()->name}}</p>
                        <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                    <h6 class="p-3 mb-0">Perfil</h6>
                    <div class="dropdown-divider"></div>
                    @can('users_access')
                    <a class="dropdown-item preview-item" href="{{route('users.index')}}">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-account-group text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject mb-1">Users</p>
                        </div>
                    </a>
                    @endcan
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary"> <i class="mdi mdi-logout text-primary"></i> Cerrar Sesion</button>
                        </form>
                    </a>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
        </button>
    </div>
</nav>