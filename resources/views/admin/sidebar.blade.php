<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset("/adminlte/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p>{{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">HEADER</li>
      <!-- Optionally, you can add icons to the links -->
    </ul>
    {!! $navbar !!}
    <ul class="sidebar-menu">
      <li class="header">{{ __('clara::navbar.parameter') }}</li>
      <!-- Optionally, you can add icons to the links -->
    </ul>
    {!! $navbarparam !!}
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>