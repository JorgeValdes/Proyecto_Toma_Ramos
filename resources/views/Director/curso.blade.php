{{-- Mantenemos estandar base --}}
@extends('layout.master')

{{-- Cambiamos titulo de pagina --}}
@section('title')
  <title>Estudiante</title>
@endsection

{{-- Incluimos los archivos a utilizar para front --}}
@section('styles')
  @include('layout.materialize') {{-- De usar materialize, incluimos desde el layout --}}
@endsection

{{-- Aqui trabajamos todo el contenido de la vista --}}
@section('body')
  {{-- Contenido --}}


  <center>
    <h1>ASIGNATURAS CARRERA</h1>
    <div class="container">
      <center>
        <table id="user_table" class="table table-striped">
        <th>ID</th>
          <th>Código</th>
          <th>Nombre</th>
          <th>Creditos</th>
          <th>Semestre</th>
          <th>Editar</th>
          <th>Eliminar</th>
          <th></th>
        </thead>
        <tbody>
         @foreach($muestracursos as $muestracurso)
            <tr>
             <td>{{$muestracurso->id }}</td>
              <td>{{$muestracurso->codigo }}</td>
              <td>{{$muestracurso->nombre }}</td>
              <td>{{$muestracurso->creditos }}</td> 
              <td>{{$muestracurso->semestre}}</td> 
              <td>
              <td><a href="{{route('director.cursodestroy', $muestracurso->id)}}" onclick="M.toast({html: 'ramo eliminado exitosamente', displayLenght: 4000})" class="btn btn red"> eliminar</a></td>
            </tr>      
          @endforeach
        </tbody>

       </table>

       <!-- MODAL-->
       <div class="container section">
         <a href="#idModal" class="btn modal-trigger"> Añadir curso</a>

         <div id="idModal" class="modal">          
           <div class="modal-content">
            <form action="{{ route('curso.guardado') }}" method="POST">
              @csrf
              <h3>FORMULARIO NUEVO CURSO</h3>
              <h5>Nombre</h5>
              <input type="text" id="nombre" name="nombre">
              <h5>Codigo</h5>
              <input type="text" id="codigo" name="codigo">
              <h5>Creditos</h5>
              <input type="text" id="creditos" name="creditos">
              <h5>Semestre</h5>
              <input type="text" id="semestre" name="semestre">

                <button class="btn btn-info" onclick="M.toast({html: 'Ramo  Agregado exitosamente', displayLenght: 4000})" type="submit">Añadir</button>
             </form>
           </div>
         </div>

       </div>
      </center>
</div>

  
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });

</script>

<script>
    document.addEventListener('h', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });

</script>

