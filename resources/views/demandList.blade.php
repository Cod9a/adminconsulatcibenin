@extends('layouts.template')
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">

@section('content')

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">lISTE DES DEMANDES</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Basic Datatable</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Date de la demande</th>
                                                <th>Nom  et prenom</th>
                                                <th> prenom</th>
                                                <th>Document </th>
                                                <th>Paiement</th>
                                                <th>Status</th>
                                                <th>Date de rdv</th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a
                    href="https://www.wrappixel.com">WrapPixel</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>


        <script>

            $(document).ready(function() {

            $('#zero_config').DataTable({
                destroy: true,
                paging: true,
                responsive: true,
                orderCellsTop: true,
                fixedHeader: true,
                select: true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },
                "order": [
                    [0, 'desc']
                ],
                "ajax": {
                    url: "{{ url('/getList/') }}",
                    dataType: 'JSON'

                },
                "columns": [
                    {
                        "data": "created_at"
                    },
                    {
                        "data": "nom"
                    },

                    {
                        "data": "prenom"
                    },

                    {
                        "data": "titre_doc"
                    },

                    {
                        "data": "prix"
                    },
                    {
                        "data": "status"
                    },
                    {
                        "data": "validite"
                    }
                ],


            });


            });



        </script>


        @endsection
