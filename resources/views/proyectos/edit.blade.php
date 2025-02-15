@extends('proyectos.plantilla') <!-- Extiende la plantilla principal -->


@section('content')

<h1>Este es la página para editar un proyecto</h1>

<form action="{{ route('proyectos.update', $proyecto->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>
        Nombre: 
        <input type="text" name="nombre" value="{{ old('nombre', $proyecto->nombre) }}">
    </label>
    @error('nombre')
        <p style="color:red;">{{ $message }}</p>
    @enderror
    <br><br>

    <label>
        Fuente de Fondos: 
        <input type="text" name="fuentes_fondos" value="{{ old('fuentes_fondos', $proyecto->fuentes_fondos) }}">
    </label>
    @error('fuentes_fondos')
        <p style="color:red;">{{ $message }}</p>
    @enderror
    <br><br>

    <label>
        Monto Planificado $: 
        <input type="text" name="monto_planificado" value="{{ old('monto_planificado', $proyecto->monto_planificado) }}">
    </label>
    @error('monto_planificado')
        <p style="color:red;">{{ $message }}</p>
    @enderror
    <br><br>

    <label>
        Monto Patrocinado: 
        <input type="text" name="monto_patrocinado" value="{{ old('monto_patrocinado', $proyecto->monto_patrocinado) }}">
    </label>
    @error('monto_patrocinado')
        <p style="color:red;">{{ $message }}</p>
    @enderror
    <br><br>

    <label>
        Fondos Propios: 
        <input type="text" name="fondos_propios" value="{{ old('fondos_propios', $proyecto->fondos_propios) }}">
    </label>
    @error('fondos_propios')
        <p style="color:red;">{{ $message }}</p>
    @enderror
    <br><br>

    <button type="submit">Actualizar Proyecto</button>
</form>

@endsection
