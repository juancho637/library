@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $service->title }}</div>

                    <div class="card-body">
                        {{ $service->description }}
                        <br>
                        <br>
                        <a href="{{ route('services.edit', $service) }}" class="btn btn-warning float-right">Editar servicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
