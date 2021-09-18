<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html"> <img alt="image" src="{{ asset('assets/img/oacj.png') }}" class="header-logo" />
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Menú</li>
      <li class="dropdown {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
        <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-desktop"></i><span>Panel
            Principal</span></a>
      </li>
      <li class="dropdown {{ Request::segment(2) == 'profesor' ? 'active' : '' }}">
        <a href="{{ route('admin.teacher') }}" class="nav-link"><i class="fas fa-chalkboard-teacher"></i><span>Profesores</span></a>
      </li>
      <li class="dropdown {{ Request::segment(2) == 'alumno' ? 'active' : '' }}">
        <a href="{{ route('admin.student') }}" class="nav-link"><i class="fas fa-book-reader"></i><span>Estudiantes</span></a>
      </li>
      <li class="dropdown {{ Request::segment(2) == 'escuela' ? 'active' : '' }}">
        <a href="{{ route('admin.school') }}" class="nav-link"><i class="fas fa-school"></i><span>Escuelas</span></a>
      </li> 


    </ul>
  </aside>
</div>