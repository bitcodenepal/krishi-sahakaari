<!DOCTYPE html>
<html lang="en">
<head>
    <title>कृषि उपज बजार ब्यबस्थापन सहकारी संस्था ली.</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}"/>
    <link href="{{ asset('css/data-tables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatable-bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/nepali.datepicker.v2.1.min.css') }}">
    @yield('page-styles')
    <style>
        .btn, .modal-content {
            border-radius: 0px;
        }
        .naya_convert{
 	     	display: none;
 		}
    </style>
    @yield('custom-styles')
</head>
<body class="app sidebar-mini rtl">
@include('layouts.partials._header')
@include('layouts.partials._sidebar')
<main class="app-content">
    @yield('content')
</main>
<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('js/datatables-jquery.min.js') }}"></script>
<script src="{{ asset('js/datatables-bootstrap.min.js') }}"></script>
<script src="{{ asset('js/nepali.datepicker.v2.1.min.js') }}"></script>
<script src="{{ asset('js/nepalidate.js') }}"></script>
<script src="{{ asset('js/nayaEN2NPinit.js') }}"></script>
@yield('page-scripts')
@yield('custom-scripts')
<script>
    @if(Session::has('success'))
    jQuery.notify({
        title: "सफल : ",
        message: "{{ Session::get('success') }}",
        icon: 'fa fa-check'
    }, {
        type: "success"
    });
    @endif
    @if(Session::has('info'))
    jQuery.notify({
        title: "जानकारी : ",
        message: "{{ Session::get('info') }}",
        icon: 'fa fa-exclamation-triangle'
    }, {
        type: "info"
    });
    @endif
    @if(Session::has('error'))
    jQuery.notify({
        title: "त्रुटि : ",
        message: "{{ Session::get('error') }}",
        icon: 'fa fa-times-circle'
    }, {
        type: "danger"
    });
    @endif
</script>
</body>
</html>
