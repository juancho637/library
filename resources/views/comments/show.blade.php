@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{ $comment->message }}
                        <br>
                        <br>
                        <form method="post" action="{{ route('comments.update', $comment) }}">
                            @csrf
                            {{ method_field('PUT') }}
                            @if($comment->show)
                                <input type="text" name="show" value="0" hidden>
                                <button type="submit" class="btn btn-primary float-right">Ocultar de la caja de comentarios</button>
                            @else
                                <input type="text" name="show" value="1" hidden>
                                <button type="submit" class="btn btn-primary float-right">Mostrar en la caja de comentarios</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
