@extends('layouts.master')

@section('content')

    <div class="app-title">
        <h1><i class="fa fa-arrow-circle-up fa-fw"></i> डाटा आयात कार्यक्षमता</h1>
    </div>

    @if ($errors->has('select_file'))
        <div class="bs-component">
            <div class="alert alert-dismissible alert-danger">
                <button class="close" type="button" data-dismiss="alert">×</button>
                {{ $errors->first('select_file') }}
            </div>
        </div>
    @endif

    <div class="tile">
        <div class="tile-body">
            <form method="post" enctype="multipart/form-data" action="{{ route('import.import_excel') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <table class="table">
                        <tr>
                            <td><label>बचत खाताको एक्सेल पाना चयन गर्नुहोस्</label></td>
                            <td>
                                <input type="file" name="select_file"/>
                            </td>
                            <td>
                                <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>

@stop
