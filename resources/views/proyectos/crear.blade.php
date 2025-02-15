@extends('proyectos.plantilla') <!-- Si deseas extender una plantilla -->

@section('content')

{{--comentario en blade--}}

{{-- este es el paso 2.3 despues de crear la ruta ponemos el formulario o diseño de la pagina--}}
<h1>este es un formulario para crear un nuevo proyecto</h1><br><br><br><br><br>



{{-- action="{{route('proyectos.store')}}" method="POST" 
me sirve para que estos dato vayan al controlado store que el recibe esos datos --}}
<form action="{{route('proyectos.store')}}" method="POST">
@csrf
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Nombre del Proyecto</label>
  <input type="text" class="form-control" name="nombre" id="formGroupExampleInput" placeholder="Nombre del Proyecto">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Fuentes Fondos</label>
  <input type="text" class="form-control" name="fuentesfondos" id="formGroupExampleInput2" placeholder="Fuentes Fondos">
</div>

<div class="mb-3">
  <label for="formGroupExampleInput3" class="form-label">Montos pLANIFICADO</label>
  <input type="number" step="0.1" class="form-control" name="monto" id="formGroupExampleInput3" placeholder="Monto Planificado $">
</div>

<div class="mb-3">
  <label for="formGroupExampleInput4" class="form-label">Montos Patrocinado</label>
  <input type="number" step="0.1" class="form-control" name="montopatrocinado" id="formGroupExampleInput4" placeholder="Monto Patrocinado $">
</div>

<div class="mb-3">
  <label for="formGroupExampleInput5" class="form-label">Montos Propios</label>
  <input type="number" step="0.1" class="form-control" name="montopropio" id="formGroupExampleInput5" placeholder="Montos Propios $">
</div>

<button type="submit" class="btn btn-primary">Enviar</button>
</form>

@endsection