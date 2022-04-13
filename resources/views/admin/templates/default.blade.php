<!DOCTYPE html>
<html lang="en">
    @include('admin.templates.partials.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('admin.templates.partials.preloader')
    @include('admin.templates.partials.navbar')
    @include('admin.templates.partials.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('admin.templates.partials.content-header')
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  @include('admin.templates.partials.footer')
  @include('admin.templates.partials.control-sidebar')
</div>
<!-- ./wrapper -->
    @include('admin.templates.partials.scripts')

</body>
</html>
