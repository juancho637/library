@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $book->title }}</div>

                    <div class="card-body">
                        {{ $book->description }}
                        <br>
                        <br>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning float-right">Editar libro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
