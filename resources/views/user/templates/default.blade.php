<!DOCTYPE html>
<html lang="en">
    @include('user.templates.partials.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('user.templates.partials.preloader')
    @include('user.templates.partials.navbar')
    @include('user.templates.partials.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('user.templates.partials.content-header')
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  @include('user.templates.partials.footer')
  @include('user.templates.partials.control-sidebar')
</div>
<!-- ./wrapper -->
    @include('user.templates.partials.scripts')

</body>
</html>
