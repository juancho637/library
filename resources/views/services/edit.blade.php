@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Crear servicios</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('services.update', $service) }}">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label for="title">Titulo del servicio</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $service->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Contenido del servicio</label>
                                <textarea class="form-control" name="description" id="description" rows="3" required>{{ $service->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar servicio</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
