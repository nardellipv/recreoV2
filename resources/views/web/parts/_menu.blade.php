<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html"> <img alt="image" src="{{ asset('assets/img/oacj.png') }}" class="header-logo" />
      </a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Menú</li>
      <li class="dropdown {{ Route::current()->getName() == 'dashboard' ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-desktop"></i><span>Panel
            Principal</span></a>
      </li>
      @if(current_user()->userType == 'Admin')
      <li class="dropdown">
        <a href="{{ route('admin.dashboard') }}" class="nav-link" target="blank_"><i class="fas fa-desktop"></i><span>Administrador</span></a>
      </li>
      @endif
      <li class="dropdown {{ Route::current()->getName() == 'school.edit' ? 'active' : '' }}">
        <a href="{{ route('school.edit', current_user()->id) }}" class="nav-link"><i
            class="fas fa-school"></i><span>Editar datos del colegio</span></a>
      </li>
      <li class="dropdown {{ Request::segment(1) == 'profesor' ? 'active' : '' }}">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i
            class="fas fa-chalkboard-teacher"></i><span>Profesores</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('teacher.list') }}">Listado de profesores</a></li>
          <li><a class="nav-link" href="{{ route('teacher.add') }}">Agregar nuevo profesor</a></li>
        </ul>
      </li>
      <li class="dropdown {{ Request::segment(1) == 'alumno' ? 'active' : '' }}">
        <a href="#" class="menu-toggle nav-link has-dropdown"><i
            class="fas fa-book-reader"></i><span>Estudiantes</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{ route('student.list') }}">Listado de estudiantes</a></li>
          <li><a class="nav-link" href="{{ route('student.add') }}">Agregar nuevo estudiante</a></li>
        </ul>
      </li>
      <li>
        <a href="{{ route('logout') }}"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link"><i
            class="fas fa-sign-out-alt"></i><span>Salir</span></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </aside>
</div>