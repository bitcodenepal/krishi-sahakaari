@extends('layouts.master')

@section('page-styles')

    <link rel="stylesheet" href="{{ asset('css/buttons.dataTables.min.css') }}">

@stop

@section('custom-styles')
    <style>
        .dataTables_filter {
            float: left !important;
        }
    </style>
@endsection

@section('content')

    <div class="app-title">
        <h1><i class="fa fa-th-list fa-fw"></i> हार्वेस्टर प्रयोगको सूची</h1>
        <a class="btn btn-md btn-primary" href="{{ route('harvester.create') }}"><i class="fa fa-plus-circle fa-fw"></i>
            हार्वेस्टर प्रयोगको विवरण थप्नुहोस्</a>
    </div>

    <div class="tile">
        <div class="float-right" id="dt-buttons"></div>
        <br>
        <div class="tile-body">
            <div class="table-responsive">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th width="50px">खरीद/बिक्रि</th>
                        <th width="50px">सम्पादन गर्नुहोस्</th>
                        <th width="50px">विवरण हटाउनुहोस्</th>
                        <th>हार्वेस्टर प्रयोगकर्ताको नाम</th>
                        <th>सम्पर्क नम्बर</th>
                        <th>स्थाई ठेगाना</th>
                        <th>प्रयोग गरिने ठाउँ</th>
                        <th>प्रयोगको मिति</th>
                        <th>रकम</th>
                        <th>विवरण</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection

@section('page-scripts')

    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js')  }}"></script>

@stop

@section('custom-scripts')

    <script>

        jQuery(function ($) {

            let table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('harvester.index') }}",
                columns: [
                    {data: 'view', name: 'view', orderable: false, searchable: false},
                    {data: 'edit', name: 'edit', orderable: false, searchable: false},
                    {data: 'delete', name: 'delete', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'contact_no', name: 'contact_no'},
                    {data: 'address', name: 'address'},
                    {data: 'use_address', name: 'use_address'},
                    {data: 'use_date', name: 'use_date'},
                    {data: 'amount', name: 'amount'},
                    {data: 'description', name: 'description'},
                ],
            });

            new $.fn.dataTable.Buttons(table, {
                buttons : [
                    {
                        extend: "print",
                        title: "बचत खाता सूची",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
                        },
                        text: '<i class="fa fa-fw fa-print"></i> Print'
                    },
                    {
                        extend: 'excel',
                        title: 'बचत खाता सूची',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
                        },
                        text: '<i class="fa fa-fw fa-file-excel"></i> Excel'
                    },
                ]
            }).container().appendTo($('#dt-buttons'));

            // $(".data-table").on('click', '.buy-sell', function(e) {
            //     e.preventDefault();
            //     let id = this.dataset.id;
            //     let url = "{!! route('food.show', ':id') !!}";
            //     url = url.replace(":id", id);
            //     $.get(url, function(response) {
            //         $(".modal-content").html(response);
            //         $("#loan-details").modal('show');
            //     });
            // });

            // $(".data-table").on('click', '.delete-food', function (e) {
            //     e.preventDefault();
            //     if(confirm("के तपाईं यो विवरण निश्चय हटाउन चाहानुहुन्छ?")) {
            //         let id = this.dataset.id;
            //         let url = "{!! route('food.destroy', ':id') !!}";
            //         url = url.replace(":id", id);
            //         $.ajax({
            //             url: url,
            //             type: "DELETE",
            //             data: {
            //                 "_token": "{{ csrf_token() }}",
            //             },
            //             success: function (response) {
            //                 alert(response);
            //                 location.reload();
            //             }
            //         });
            //     } else {
            //         return false;
            //     }
            // });

        });

    </script>

@stop