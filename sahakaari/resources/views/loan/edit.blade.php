@extends('layouts.master')

@section('page-styles')

    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    
@endsection

@section('content')

    <div class="app-title">
        <h1><a href="{{ route('savings.index') }}"><i class="fa fa-arrow-circle-left fa-fw"></i></a>
            &nbsp;&nbsp;&nbsp; ऋण विवरण सम्पादन गर्नुहोस्
        </h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="tile">
                <form class="form-horizontal" method="post" action="{{ route('loan.update', $loan->id) }}">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="tile-body">
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">ऋणको प्रकार</label>
                            <div class="col-md-8">
                                <select name="acc_type" id="acc-type"
                                        class="form-control select2 {{ ($errors->has('acc_type')) ? 'is-invalid' : '' }}">
                                    <option disabled>-- ऋणको प्रकार चयन गर्नुहोस् --</option>
                                    <option value="साधारण" {{ ($loan->loan_type == "साधारण") ? 'selected' : '' }}>
                                        साधारण
                                    </option>
                                    <option value="धितो" {{ ($loan->loan_type == "धितो") ? 'selected' : '' }}>
                                        धितो
                                    </option>
                                    <option value="ओभरड्राफ्ट" {{ ($loan->loan_type == "ओभरड्राफ्ट") ? 'selected' : '' }}>
                                        ओभरड्राफ्ट
                                    </option>
                                </select>
                                @if($errors->has('loan_type'))
                                    <div class="invalid-feedback">{{ $errors->first('loan_type') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">खातावालाको आईडी</label>
                            <div class="col-md-8">
                                <select name="share_id" id="share-id" class="form-control select2">
                                    <option value="" selected> -- खातावालाको आईडी चयन गर्नुहोस् --</option>
                                    @foreach ($nos as $no)
                                        <option value="{{ $no }}" {{ ($loan->share->no == $no) ? "selected" : ""}}>{{ $no }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('share_id'))
                                    <div class="invalid-feedback">{{ $errors->first('share_id') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">Name (नाम)</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" name="name"
                                           class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}"
                                           placeholder="नयाँ खातावालाको नाम" id="name" value="{{ old('name') }}" readonly>
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">खातावालाको स्थाई ठेगाना</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-map-marked-alt"></i></span>
                                    </div>
                                    <input type="text" name="address"
                                           class="form-control {{ ($errors->has('address')) ? 'is-invalid' : '' }}"
                                           placeholder="खातावालाको स्थाई ठेगाना" id="address" value="{{ old('address') }}" readonly>
                                    @if($errors->has('address'))
                                        <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">खातावालाको सम्पर्क नम्बर</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="contact_no"
                                           class="form-control {{ ($errors->has('contact_no')) ? 'is-invalid' : '' }}"
                                           placeholder="खातावालाको सम्पर्क नम्बर" id="contact-no" value="{{ old('contact_no') }}" readonly>
                                    @if($errors->has('contact_no'))
                                        <div class="invalid-feedback">{{ $errors->first('contact_no') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">रकम</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="number" name="amount"
                                           class="form-control {{ ($errors->has('amount')) ? 'is-invalid' : '' }}"
                                           placeholder="रकम" value="{{ old('amount', $loan->amount) }}">
                                    @if($errors->has('amount'))
                                        <div class="invalid-feedback">{{ $errors->first('amount') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">कुल ब्याज प्रतिशत</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                    </div>
                                    <input type="number" name="interest"
                                           class="form-control {{ ($errors->has('interest')) ? 'is-invalid' : '' }}"
                                           placeholder="कुल ब्याज प्रतिशत" value="{{ $loan->interest }}">
                                    @if($errors->has('interest'))
                                        <div class="invalid-feedback">{{ $errors->first('interest') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-success float-right" type="submit"><i
                                        class="fa fa-fw fa-lg fa-check-circle"></i>सम्पादन गर्नुहोस्
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop

@section('page-scripts')

    <script src="{{ asset('js/select2.min.js') }}"></script>
    
@endsection

@section('custom-scripts')

    <script>
    
        jQuery(function($) {
            
            $(".select2").select2();

            let accId = $("#share-id").val();
            $.get("{{ route('get-share-details') }}", {accId}, function(response) {
                $("#name").attr('value', response.share[0].name);
                $("#address").attr('value', response.share[0].address);
                $("#contact-no").attr('value', response.share[0].contact_no);
                $("#balance").attr('value', response.balance)
            });

            $("#share-id").change(function() {
                let accId = $("#share-id").val();
                $.get("{{ route('get-share-details') }}", {accId}, function(response) {
                    $("#name").attr('value', response.share[0].name);
                    $("#address").attr('value', response.share[0].address);
                    $("#contact-no").attr('value', response.share[0].contact_no);
                    $("#balance").attr('value', response.balance)
                });
            });          

        });
    
    </script>
    
@endsection
