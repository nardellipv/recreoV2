<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html"> <img alt="image" src="{{ asset('assets/img/logo.png') }}" class="header-logo" /> <span
            class="logo-name">OACJ</span>
        </a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Menú</li>
        <li class="dropdown active">
          <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-chalkboard-teacher"></i><span>Panel Principal</span></a>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              class="fas fa-user-alt"></i><span>Profesores</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="widget-chart.html">Listado de estudiantes</a></li>
            <li><a class="nav-link" href="widget-data.html">Agregar nuevo estudiante</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i
              class="fas fa-book-reader"></i><span>Estudiantes</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="widget-chart.html">Listado de estudiantes</a></li>
            <li><a class="nav-link" href="widget-data.html">Agregar nuevo estudiante</a></li>
          </ul>
        </li>
      </ul>
    </aside>
  </div>