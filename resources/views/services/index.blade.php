@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Servicios
                        <div class="float-right">
                            <a href="{{ route('services.create') }}">Nuevo servicio</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Contenido</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{ $service->title }}</td>
                                        <td>{!! \Illuminate\Support\Str::words($service->description, 16,'...') !!}</td>
                                        <td>
                                            {{--<a href="{{ route('services.show', $service) }}" class="btn btn-sm btn-link">Visualizar</a>--}}
                                            <a href="{{ route('services.edit', $service) }}" class="btn btn-sm btn-link">Editar</a>
                                            <form method="post" action="{{ route('services.destroy', $service) }}" style="display: inline">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" onclick="return confirm('¿Estas seguro de querer eliminar este servicio?')" class="btn btn-sm btn-link">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
