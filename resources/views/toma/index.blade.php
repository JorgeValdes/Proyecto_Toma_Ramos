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
    <h1>MI SOLICITUD DE TOMA DE RAMOS</h1>
    <div class="container">
      <center>
        <table id="user_table" class="table table-striped">
          <th>ID</th>
          <th>Código</th>
          <th>Curso</th>
          <th>Creditos</th>
          <th>Motivo</th>
          <th>Estado</th>
          <th>Eliminar</th>>
          <th></th>
        </thead>
        <tbody>
          @foreach($user->tomarcursos()->orderBy('id','ASC')->get() as $tomarcurso)
            <tr>
              <td>{{ $tomarcurso->id }}</td>
              <td>{{ $tomarcurso->curso->codigo }}</td>
              <td>{{ $tomarcurso->curso->nombre }}</td>
              <td>{{ $tomarcurso->curso->creditos }}</td>  
              <td>{{ $tomarcurso->motivo}} </td> 
              <td>{{ $tomarcurso->estado }}</td> 
              
              <td><a href="{{route('tomacurso.destroy', $tomarcurso->id)}}" class="btn btn red"> eliminar</a></td>
            </tr>      
          @endforeach
        </tbody>

       </table>

       <!-- MODAL-->
       <div class="container section">
         <a href="#idModal" class="btn modal-trigger"> Añadir curso</a>

         <div id="idModal" class="modal">          
           <div class="modal-content">
            <form action="{{ route('usuario.guarda2') }}" method="POST">
              @csrf

              <h3> Ingrese el curso</h3>
            
              
              <!-- SELECT-->
                <div class="input-field col s12">
                  <select name="nombre">
                    @foreach($cursos as $curso)
                      <option>{{$curso->nombre}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="input-field col s12">
                  <select name ="motivo"> 
                    <option value="sin_prerequisito">sin_prerequisito</option>
                    <option value="con_prerequisito">con_prerequisito</option>
                    <option value="no lo inscribi">no lo inscribi</option>
                    <option value="aumento de creditos">aumento de creditos</option>
                  </select>
                </div>





                <button class="btn btn-info" type="submit">Añadir</button>
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

