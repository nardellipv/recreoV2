<nav class="navbar navbar-expand-lg main-navbar sticky">
    <div class="form-inline mr-auto">
    </div>
    <ul class="navbar-nav navbar-right">     
      <li class="dropdown"><a href="#" data-toggle="dropdown"
          class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{ asset('assets/img/user.png') }}"
            class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
        <div class="dropdown-menu dropdown-menu-right pullDown">
          <div class="dropdown-title">Hola, {{ current_user()->name }}</div>
          <a href="{{ route('school.edit', current_user()->id) }}" class="dropdown-item has-icon"> <i class="fas fa-school"></i> Editar datos del colegio
          </a> <a href="{{ route('teacher.list') }}" class="dropdown-item has-icon"> <i class="fas fa-chalkboard-teacher"></i>
            Listado de profesores
          </a> <a href="{{ route('student.list') }}" class="dropdown-item has-icon"> <i class="fas fa-book-reader"></i>
            Listado de estudiantes
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt"></i>
            Salir
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>
    </ul>
  </nav>