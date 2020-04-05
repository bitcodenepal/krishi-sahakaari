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
        <h1><i class="fa fa-th-list fa-fw"></i> बचत खाता सूची</h1>
        <a class="btn btn-md btn-primary" href="{{ route('savings.create') }}"><i class="fa fa-plus-circle fa-fw"></i>
            नयाँ खाता थप्नुहोस्</a>
    </div>

    <div class="tile">
        <div class="float-right" id="dt-buttons"></div>
        <br>
        <div class="tile-body">
            <div class="table-responsive">
                <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                        <th width="50px">विवरण हेर्नुहोस्</th>
                        <th width="50px">सम्पादन गर्नुहोस्</th>
                        <th width="50px">विवरण हटाउनुहोस्</th>
                        <th>खातावालाको आईडी</th>
                        <th>खातावालाको नाम</th>
                        <th>सम्पर्क नम्बर</th>
                        <th>स्थाई ठेगाना</th>
                        <th>खाताको प्रकार</th>
                        <th>कुल रकम</th>
                        <th>ब्याजदर</th>
                        <th>खाता नम्बर</th>
                        <th>विवरण</th>
                        <th>कैफियत</th>
                        <th>मिति</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop

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
                ajax: "{{ route('savings.index') }}",
                columns: [
                    {data: 'view', name: 'view', orderable: false, searchable: false},
                    {data: 'edit', name: 'edit', orderable: false, searchable: false},
                    {data: 'delete', name: 'delete', orderable: false, searchable: false},
                    {data: 'no', name: 'no'},
                    {data: 'name', name: 'name'},
                    {data: 'contact_no', name: 'contact_no'},
                    {data: 'address', name: 'address'},
                    {data: 'acc_type', name: 'acc_type'},
                    {data: 'money', name: 'money'},
                    {data: 'interest', name: 'interest'},
                    {data: 'acc_no', name: 'acc_no'},
                    {data: 'description', name: 'description'},
                    {data: 'remarks', name: 'remarks'},
                    {data: 'date', name: 'date'},
                ],
            });

            new $.fn.dataTable.Buttons(table, {
                buttons : [
                    {
                        extend: "print",
                        title: "बचत खाता सूची",
                        exportOptions: {
                            columns: [3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
                        },
                        text: '<i class="fa fa-fw fa-print"></i> Print'
                    },
                    {
                        extend: 'excel',
                        title: 'बचत खाता सूची',
                        exportOptions: {
                            columns: [3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
                        },
                        text: '<i class="fa fa-fw fa-file-excel"></i> Excel'
                    },
                ]
            }).container().appendTo($('#dt-buttons'));

            $(".data-table").on('click', '.delete-savings', function (e) {
                e.preventDefault();
                if(confirm("के तपाईं यो विवरण निश्चय हटाउन चाहानुहुन्छ?")) {
                    let id = this.dataset.id;
                    let url = "{!! route('savings.destroy', ':id') !!}";
                    url = url.replace(":id", id);
                    $.ajax({
                        url: url,
                        type: "DELETE",
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            alert(response);
                            location.reload();
                        }
                    });
                } else {
                    return false;
                }
            });

        });

    </script>

@stop
