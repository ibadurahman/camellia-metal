  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Camelia Metal</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
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
          @if(Auth::user()->getRoleNames()[0] == 'admin')
            <li class="nav-header">ADMIN</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Admin
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('admin.user.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Admin: Users</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin.workorder.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-list"></i>
                    <p>Admin: Workorders</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin.production.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-cash-register"></i>
                    <p>Admin: Productions</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin.oee.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>Admin: OEE</p>
                  </a>
                </li>
              </ul>
            </li>
          @endif
          <li class="nav-header">MAIN MENU</li>
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>Realtimes</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('dailyReport.index')}}" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>Reports</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('workorder.index')}}" class="nav-link">
              <i class="nav-icon fas fa-file-word"></i>
              <p>Workorders</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>