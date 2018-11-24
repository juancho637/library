@extends('layouts.app')

@push('scripts')
    <!-- DataTables -->
    <script src="{{ asset('/plugins/datatables/datatables.min.js') }}"></script>

    <script>
        $(function () {
            $('#books').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatable.subscribers.index') }}",
                columns: [
                    {data: 'id'},
                    {data: 'email'},
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
                        Subscriptores
                    </div>

                    <div class="card-body">
                        <table id="books" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Correo electrónico</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
