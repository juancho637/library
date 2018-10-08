@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Comentarios</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ $comment->message }}</td>
                                    <td>
                                        @if($comment->show)
                                            En caja de comentarios
                                        @else
                                            Validar comentario
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('comments.show', $comment) }}" class="btn btn-sm btn-primary">Visualizar</a>
                                        <form method="post" action="{{ route('comments.destroy', $comment) }}" style="display: inline">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" onclick="return confirm('¿Estas seguro de querer eliminar este comentario?')" class="btn btn-sm btn-danger">Eliminar</button>
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
