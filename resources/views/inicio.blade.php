@extends('layout.plantilla')

@section('tituloPagina','Crud con Laravel 8')

@section('contenido')
    <div class="card">
        <div class="card-header">
            <i class="fab fa-laravel">  CRUD con Laravel 8</i>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    @if($mensaje= Session::get('success'))
                    <div class="alert alert-success" role="alert">
                            {{$mensaje}}
                    </div>
                    @endif
                </div>
            </div>
        <h5 class="card-title"><center>Listado de personas en el Sistema.</center></h5>
        <hr>
        <p class="card-text">
            <div class="table table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha Nacimiento</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                        @foreach ($datos as $item)
                        <tr>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->apellido}}</td>
                            <td>{{$item->fecha_nacimiento}}</td>
                            <td>
                                <form action="{{route("personas.edit", $item->id)}}" method="GET">
                                    <button class="btn btn">Editar</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route("personas.show", $item->id)}}" method="GET">
                                    <button class="btn btn">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-12">
                        {{-- Paginacion --}}
                        {!! $datos->links() !!}

                    </div>
                </div>
            </div>
        </p>
        <p>
            <a href="{{route("personas.create")}}" class="btn btn-primary w-100">
                <span class="fas fa-user-plus"></span> Agregar nueva persona
            </a>
        </p>
        </div>
    </div>

@endsection
