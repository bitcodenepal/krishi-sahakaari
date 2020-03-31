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
        <h1><i class="fa fa-utensils fa-fw"></i> अन्न स्टोर</h1>
        <a class="btn btn-md btn-primary" href="{{ route('food.create') }}"><i class="fa fa-plus-circle fa-fw"></i>
            अन्न विवरण थप्नुहोस्</a>
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
                        <th>किसानको नाम</th>
                        <th>सम्पर्क नम्बर</th>
                        <th>स्थाई ठेगाना</th>
                        <th>अन्नको प्रकार</th>
                        <th>अन्नको प्रजाति</th>
                        <th>तौल</th>
                        <th>भण्डारण मूल्य</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal" id="buynsell-food">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style="border-radius: 0px;">
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

        $(function () {

            let table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('food.index') }}",
                columns: [
                    {data: 'view', name: 'view', orderable: false, searchable: false},
                    {data: 'edit', name: 'edit', orderable: false, searchable: false},
                    {data: 'delete', name: 'delete', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'contact_no', name: 'contact_no'},
                    {data: 'address', name: 'address'},
                    {data: 'variety', name: 'variety'},
                    {data: 'species', name: 'species'},
                    {data: 'weight', name: 'weight'},
                    {data: 'amount', name: 'amount'},
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

            $(".data-table").on('click', '.buy-sell', function(e) {
                e.preventDefault();
                let id = this.dataset.id;
                let url = "{!! route('food.show', ':id') !!}";
                url = url.replace(":id", id);
                $.get(url, function(response) {
                    $(".modal-content").html(response);
                    $("#loan-details").modal('show');
                });
            });

            $(".data-table").on('click', '.delete-food', function (e) {
                e.preventDefault();
                if(confirm("के तपाईं यो विवरण निश्चय हटाउन चाहानुहुन्छ?")) {
                    let id = this.dataset.id;
                    let url = "{!! route('food.destroy', ':id') !!}";
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