@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear comentario</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('comments.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="message">Comentario</label>
                                <textarea class="form-control" name="message" id="message" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Crear comentario</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
