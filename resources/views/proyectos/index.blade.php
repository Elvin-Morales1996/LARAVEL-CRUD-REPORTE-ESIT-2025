@extends('proyectos.plantilla') <!-- Si deseas extender una plantilla -->

@section('content')
    <h1>Lista de Proyectos</h1>
    <a href="{{route('proyectos.crear')}}" class="btn btn-warning btn-sm">crear un nuevo proyecto</a><br><br><br><br><br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Proyecto</th>
                <th>Fuente de Fondos</th>
                <th>Monto Planificado</th>
                <th>Monto Patrocinado</th>
                <th>Monto Fondos Propios</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proyectos as $proyec)
            <tr>
                <td>{{ $proyec->id }}</td>
                <td>{{ $proyec->nombre }}</td>
                <td>{{ $proyec->fuentes_fondos }}</td>
                <td>${{ number_format($proyec->monto_planificado,2) }}</td>
                <td>${{ number_format($proyec->monto_patrocinado, 2) }}</td>
                <td>${{ number_format($proyec->fondos_propios, 2) }}</td>
                <td>
<!--$proyec->id: es la variable de foreach que cree-->
                <a href="{{ route('proyectos.edit', $proyec->id) }}" class="btn btn-warning btn-sm">Editar</a>


<form action="{{ route('proyectos.destroy', $proyec->id) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este proyecto?')">Eliminar</button>
</form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('proyectos.pdf') }}" target="_blak"  class="btn btn-success">GENERAR REPORTE PDF</a>


@endsection




   