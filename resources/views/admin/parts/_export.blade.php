<div class="card">
    <div class="card-header">
      <h4>Exportar Datos</h4>
    </div>
    <div class="card-body">
      <div class="badges">
        <a href="{{ route('admin.exportStudentLevel1') }}" class="btn btn-primary">Exportar Estudiantes Nivel 1</a>
        <a href="{{ route('admin.exportStudentLevel2') }}" class="btn btn-primary">Exportar Estudiantes Nivel 2</a>
        <a href="{{ route('admin.exportSchoolLevelStudent') }}" class="btn btn-primary">Colegios por Nivel y Cantidad Alumnos</a>
        <a href="{{ route('admin.exportTeacherSchoolLevel') }}" class="btn btn-primary">Profesores por Escuela y Nivel</a>
      </div>
    </div>
  </div>