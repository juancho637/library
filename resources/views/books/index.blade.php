@extends('layouts.app')

@push('scripts')
    <!-- DataTables -->
    <script src="{{ asset('/plugins/datatables/datatables.min.js') }}"></script>

    <script>
        $(function () {
            $('#books').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatable.books.index') }}",
                columns: [
                    {data: 'code'},
                    {data: 'title'},
                    {data: 'floor'},
                    {data: 'shelf'},
                    @if (Auth::check())
                    {
                        name: '',
                        data: null,
                        sortable: false,
                        searchable: false,
                        render: function (data) {
                            {{--let show = '{{ route("books.show", [":book_id"]) }}';--}}
                            let edit = '{{ route("books.edit", [":book_id"]) }}';
                            let del = '{{ route("books.destroy", [":book_id"]) }}';

                            let actions = '';
                            //actions += '<a href="'+show+'" class="btn btn-sm btn-link">Visualizar</a>';
                            actions += '<a href="'+edit+'" class="btn btn-sm btn-link">Editar</a>';
                            actions += '<form method="post" action="'+del+'" style="display: inline">';
                            actions += '@csrf';
                            actions += '{{ method_field("DELETE") }}';
                            actions += '<button type="submit" onclick="return confirm(\'¿Estas seguro de querer eliminar este libro?\')" class="btn btn-sm btn-link">Eliminar</button>';
                            actions += '</form>';

                            return actions.replace(/:book_id/g, data.id);
                        }
                    }
                    @endif

                ],
                "language": {
                    "info": "_TOTAL_ registros",
                    "search": "Buscar",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "emptyTable": "No hay datos",
                    "zeroRecords": "No hay coinsidencias",
                    "infoEmpty": "",
                    "infoFiltered": ""
                }
            });
        });
    </script>
@endpush

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/datatables.min.css') }}">
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Libros
                        @if (Auth::check())
                            <div class="float-right">
                                <a href="{{ route('books.create') }}">Nuevo libro</a>
                            </div>
                        @endif
                    </div>

                    <div class="card-body">
                        <table id="books" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Título</th>
                                    <th>Piso</th>
                                    <th>Estante</th>
                                    @if (Auth::check())
                                        <th>Acciones</th>
                                    @endif
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
