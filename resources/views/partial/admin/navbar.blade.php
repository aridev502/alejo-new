<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="{{route('home')}}"><img src="{{asset('logos/main.png')}}" alt="logo" style="border-radius: 56px;
    width: 30%;
    height: 100%;" /></a>
    <a class="sidebar-brand brand-logo-mini" href="{{route('home')}}"><img src="{{asset('logos/main.png')}}" alt="logo" /></a>
  </div>

  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">

            <?php

            $email = \Auth::user()->email;
            $default = "https://www.somewhere.com/homestar.jpg";
            $size = 40;

            $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?d=" . urlencode($default) . "&s=" . $size;
            ?>

            <img class="img-xs rounded-circle " src="{{ $grav_url }}" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal">{{substr(Auth::user()->email, 0, -10)}}</h5>
            <span>{{Auth::user()->role->title}}</span>
          </div>
        </div>
        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-settings text-primary"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-onepassword  text-info"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-calendar-today text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
            </div>
          </a>
        </div>
      </div>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link">MENU</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="{{route('home')}}">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Inicio</span>
      </a>
    </li>


    @canany(['users_access','roles_access','permissions_access'])

    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#USERS" aria-expanded="false" aria-controls="USERS">
        <span class="menu-icon">
          <i class="mdi mdi-laptop"></i>
        </span>
        <span class="menu-title">USERS</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="USERS">
        <ul class="nav flex-column sub-menu">
          @can('users_access')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}" aria-expanded="false">
              <i class="fa fa-users" aria-hidden="true"></i>
              Users
            </a>
          </li>
          @endcan

          @can('roles_access')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('roles.index') }}" aria-expanded="false">
              <i class="fa fa-star" aria-hidden="true"></i>
              Roles
            </a>
          </li>
          @endcan

          @can('permissions_access')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('permissions.index') }}" aria-expanded="false">
              <i class="mr-3 mdi mdi-key" aria-hidden="false"></i>
              <span class="hide-menu">Permissions</span>
            </a>
          </li>
          @endcan
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user.report') }}" aria-expanded="false">
              <i class="fa fa-list" aria-hidden="true"></i>
              Reportes
            </a>
          </li>
        </ul>
      </div>
    </li>
    @endcanany





  </ul>
</nav>