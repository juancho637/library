@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Servicios</div>

                    <div class="card-body">
                        <div class="row">
                            @foreach($services as $service)
                                <div class="col-sm-6" style="margin-bottom: 20px;">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $service->title }}</h5>
                                            <p class="card-text">{!! \Illuminate\Support\Str::words($service->description, 10,'...') !!}</p>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#service{{$service->id}}">
                                                Leer mas
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="service{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $service->title }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{ $service->description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Comentarios
                        <div class="float-right">
                            <a href="{{ route('comments.create') }}">Nuevo comentario</a>
                        </div>
                    </div>

                    <ul class="list-group list-group-flush">
                        @foreach($comments as $comment)
                            @if($comment->show)
                                <div class="list-group-item">{{ $comment->message }}</div>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
