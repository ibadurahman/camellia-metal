  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Camelia Metal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      @guest
      @else
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          {{-- <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div> --}}
          <div class="info">
            <a href="@if(Auth::user()->getRoleNames()[0] == 'admin') {{route('admin.dashboard')}} @endif" class="d-block">{{Auth::user()->name}}</a>
          </div>
        </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">USERS</li>
          @guest
            <li class="nav-item">
              <a href="{{route('login')}}" class="nav-link">
                <i class="nav-icon fas fa-ellipsis-h"></i>
                <p>Login</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('register')}}" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Register</p>
              </a>
            </li>
          @else
            <li class="nav-item">
              <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
              </a>
              
              <form action="{{route('logout')}}" method="POST" id="logout-form">
                @csrf
              </form>
            </li>
          @endguest
          <li class="nav-header">ADMIN DATA</li>
          <li class="nav-item">
            <a href="{{route('admin.user.index')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.workorder.index')}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>Workorders</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.production.index')}}" class="nav-link">
              <i class="nav-icon fas fa-cash-register"></i>
              <p>Productions</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.oee.index')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>OEE</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      @endguest
    </div>
    <!-- /.sidebar -->
  </aside>