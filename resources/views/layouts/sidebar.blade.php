@php
  use App\Helpers\RoleHelper;
@endphp
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        {{-- show only admin --}}
        @if(RoleHelper::admin())
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('level.index') }}"><i class="fa fa-circle-o"></i> Level</a></li>
            <li><a href="{{ route('petugas.index') }}"><i class="fa fa-circle-o"></i> Petugas</a></li>
            <li><a href="{{ route('masyarakat.index') }}"><i class="fa fa-circle-o"></i> Masyarakat</a></li>
            <li><a href="{{ route('barang.index') }}"><i class="fa fa-circle-o"></i> Barang</a></li>
          </ul>
        </li>
        @endif
        {{-- edn --}}
        <li class="header">Menu Lelang</li>
        <li><a href="{{ route('lelang.index') }}"><i class="fa fa-circle-o text-red"></i> <span>Lelang</span></a></li>
        <li><a href="{{ route('history-lelang.index') }}"><i class="fa fa-circle-o text-yellow"></i> <span>History Lelang</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>