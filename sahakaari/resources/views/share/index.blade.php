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
        <h1><i class="fa fa-th-list fa-fw"></i> सेयर होल्डरको सूची</h1>
        <a class="btn btn-md btn-primary" href="{{ route('share.create') }}"><i class="fa fa-plus-circle fa-fw"></i> नयाँ सेयर होल्डर थप्नुहोस्</a>
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
                        <th>इमेज</th>
                        <th>सदस्यता नम्बर</th>
                        <th>सेयर होल्डरको नाम</th>
                        <th>स्थाई ठेगाना</th>
                        <th>बाजेको नाम</th>
                        <th>बुवाको नाम</th>
                        <th>लिङ्ग</th>
                        <th>वैवाहिक स्थिति</th>
                        <th>दम्पतिको नाम</th>
                        <th>हकवालाको नाम</th>
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

    <script type="text/javascript">

        jQuery(function ($) {

            let table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('share.index') }}",
                columns: [
                    {data: 'view', name: 'view', orderable: false, searchable: false},
                    {data: 'edit', name: 'edit', orderable: false, searchable: false},
                    {data: 'delete', name: 'delete', orderable: false, searchable: false},
                    {data: 'image', name: 'image', orderable: false, searchable: false},
                    {data: 'no', name: 'no'},
                    {data: 'name', name: 'name'},
                    {data: 'address', name: 'address'},
                    {data: 'grandfather_name', name: 'grandfather_name'},
                    {data: 'father_name', name: 'father_name'},
                    {data: 'gender', name: 'gender'},
                    {data: 'marital_status', name: 'marital_status'},
                    {data: 'spouce_name', name: 'spouce_name'},
                    {data: 'inheritant', name: 'inheritant'},
                ],
            });

            new $.fn.dataTable.Buttons(table, {
                buttons : [
                    {
                        extend: "print",
                        title: "बचत खाता सूची",
                        exportOptions: {
                            columns: [4, 5, 6, 7, 8, 9, 10, 11, 12],
                        },
                        text: '<i class="fa fa-fw fa-print"></i> Print'
                    },
                    {
                        extend: 'excel',
                        title: 'बचत खाता सूची',
                        exportOptions: {
                            columns: [4, 5, 6, 7, 8, 9, 10, 11, 12],
                        },
                        text: '<i class="fa fa-fw fa-file-excel"></i> Excel'
                    },
                ]
            }).container().appendTo($('#dt-buttons'));

            $(".data-table").on('click', '.delete-share', function (e) {
                e.preventDefault();
                if(confirm("के तपाईं यो विवरण निश्चय हटाउन चाहानुहुन्छ?")) {
                    let id = this.dataset.id;
                    let url = "{!! route('share.destroy', ':id') !!}";
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