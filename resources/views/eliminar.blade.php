@extends('layout.plantilla')

@section('tituloPagina',"Crear nuevo registro")

@section('contenido')
    <div class="card">
        <div class="card-header">
            <i class="fas fa-trash">  Eliminar un registro</i>
        </div>
        <div class="card-body">

            <p class="card-text">
                <div class="alert alert-danger">
                    <center>¿¡Estas seguro de eliminar este registro!?</center>
                    <br>
                    <form  action="{{route('personas.destroy', $personas->id)}}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger w-100 ">
                            <span class="fas fa-user-times"></span> Eliminar</button>
                    </form>
                </div>
                <table class="table table-sm table-hover table-bordered">
                    <thead>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha de Nacimiento</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$personas->nombre}}</td>
                            <td>{{$personas->apellido}}</td>
                            <td>{{$personas->fecha_nacimiento}}</td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <a href="{{route("personas.index")}}" class="btn btn-primary w-100">
                    <span class="fas fa-long-arrow-alt-left"></span> Regresar</a>
            </p>
        </div>
    </div>
@endsection
