@extends('adminlte::page')

@section('content')
<div class="col-md-10">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item" aria-current="page">Inicio</li>
      <li class="breadcrumb-item active" aria-current="page">Alumnos</li>
    </ol>
  </nav>

  <div class="row">
    <div class="col-md-12">
      <div class="content-box-large">

        <div class="panel-heading">
          <div class="panel-title">
            <h2>Listado de Alumnos</h2>
          </div>
        </div>

        <div class="panel-body">

          @if(Session::has('message'))
            <div class="alert alert-success" role="alert" id="msj">
              {{ Session::get('message') }}
            </div>
          @endif

          <a href="{{route('alumnos.create')}}" class="btn btn-success mt-4 ml-3"> AGREGAR </a>

          <section class="example mt-4">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover text-center" id="tabla_alumnos">
                <thead>
                  <tr>
                    <th>Numero de Control</th>
                    <th>Nombre</th>
                    <th>Semestre</th>
                    <th>Fecha Nacimiento</th>
                    <th>ACCIONES</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($alumnos as $a)
                    <tr>
                      <td>{{$a->Num_Control}}</td>
                      <td>{{$a->Nombre}}</td>
                      <td>{{$a->Semestre}}</td>
                      <td>{{$a->Fecha_Nac}}</td>
                      <td>
                        <form action="{{ route('alumnos.destroy', $a) }}" method="POST" onsubmit="return confirmarEliminacion()">
                          @csrf
                          @method('DELETE')
                          <a class="btn btn-primary btn-sm" href="{{route('alumnos.show', $a->id)}}">Detalle</a>
                          <a class="btn btn-warning btn-sm" href="{{route('alumnos.edit', $a->id)}}">Editar</a>
                          <button type="submit" class="btn btn-danger btn-sm">ELIMINAR</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </section>

        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.css" />
@stop

@section('js')
<script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>

<script>
  $(document).ready(function () {
    setTimeout(function () {
      $("#msj").fadeOut(1500);
    }, 3000);

    $('#tabla_alumnos').DataTable();
  });

  function confirmarEliminacion() {
    return confirm('¿Estás seguro de que deseas eliminar este alumno?');
  }
</script>
@stop