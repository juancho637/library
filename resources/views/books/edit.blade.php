@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Crear servicios</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('books.update', $book) }}">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="title">Titulo</label>
                                        <input type="text" class="form-control" name="title" id="title" value="{{ $book->title }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="code">Código</label>
                                        <input type="text" class="form-control" name="code" id="code" value="{{ $book->code }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="floor">No. del piso</label>
                                        <input type="number" class="form-control" name="floor" id="floor" value="{{ $book->floor }}" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="shelf">No. del estante</label>
                                        <input type="number" class="form-control" name="shelf" id="shelf" value="{{ $book->shelf }}" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar libro</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
