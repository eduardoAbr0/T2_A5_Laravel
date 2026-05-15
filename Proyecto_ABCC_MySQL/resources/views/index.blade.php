@extends('adminlte::page')

@section('content')
<div class="col-md-10">

  <!-- NVEGACION -->

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item" aria-current="page">Inicio</li>
      <li class="breadcrumb-item active" aria-current="page">Alumnos</li>
    </ol>
  </nav>

  <div class="row">

    <div class="col-md-12">

      <div class="content-box-large">
        @if (session('success'))
          <h1>
            {{ session('success') }}
          </h1>
        @endif  

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
            <div class="table-responsive" id="tablaAlumnos">

              <table class='table table-striped table-bordered table-hover text-center' id="tabla_alumnos">
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
                      <td class=v-align-middle>{{$a->Num_Control}}</td>
                      <td class=v-align-middle>{{$a->Nombre}}</td>
                      <td class=v-align-middle>{{$a->Semestre}}</td>
                      <td class=v-align-middle>{{$a->Fecha_Nac}}</td>
                      <td class=v-align-middle>

                        <form action="{{ route('alumnos.destroy', $a) }}" method="POST" class="form-horizontal"
                          role="form" onsubmit="return confirmarEliminacion()">
                          @csrf
                          @method('DELETE')

                          <a class="btn btn-primary" href="{{route('alumnos.show', $a->id)}}">Detalle</a>
                          <a class="btn btn-warning" href="{{route('alumnos.edit', $a->id) }}">Editar</a>

                          <button type="submit" class="btn btn-danger">
                            ELIMINAR </button>

                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              {{-- {!! $alumnos->links() !!}--}}

            </div>
          </section>

        </div>

      </div>

    </div>

  </div>

</div>
@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{--
<link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script type="text/javascript" src="./js/bootstrap.min.js"></script>
  
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.css" />
<script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>

<!-- JQUERY para desaparecer mensajes-->
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    setTimeout(function () {
      $("#msj").fadeOut(1500);
    }, 3000);
  });
</script>

<script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>

<script>
  let table = new DataTable('#tabla_alumnos');
</script>
@stop