@extends('layout.plantilla')

@section('tituloPagina',"Crear nuevo registro")

@section('contenido')
    <div class="card">
        <div class="card-header">
            <i class="fas fa-pen-square">  Actualizar información</i>
        </div>
        <div class="card-body">
            <p class="card-text">
                <form action="{{route('personas.update',$personas->id)}}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-sm-6 col-md-12 col-lg-6">
                            <label for="">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control mb-3 mt-2" required value="{{$personas->nombre}}">
                            <label for="">Apellido</label>
                            <input type="text" name="apellido" id="apellido" class="form-control mb-3 mt-2" required value="{{$personas->apellido}}">
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-6">
                            <label for="">Fecha de Nacimiento:</label>
                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control mb-5 mt-2" required value="{{$personas->fecha_nacimiento}}" >
                            <button class="btn btn-outline-warning w-100">
                                <span class="fas fa-pen"></span>
                                Editar</button>
                        </div>
                        <div class="col-12">
                            <a href="{{route("personas.index")}}" class="btn btn-success w-100">
                                <span class="fas fa-long-arrow-alt-left"></span>
                                Regresar</a>
                        </div>
                    </div>
                </form>
            </p>
        </div>
    </div>
@endsection
