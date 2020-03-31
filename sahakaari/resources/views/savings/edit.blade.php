@extends('layouts.master')

@section('page-styles')

    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    
@endsection

@section('content')

    <div class="app-title">
        <h1><a href="{{ route('savings.index') }}"><i class="fa fa-arrow-circle-left fa-fw"></i></a>
            &nbsp;&nbsp;&nbsp; खाता विवरण सम्पादन गर्नुहोस्
        </h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="tile">
                <form class="form-horizontal" method="post" action="{{ route('savings.update', $saving->id) }}">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="tile-body">
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">खाताको प्रकार</label>
                            <div class="col-md-8">
                                <select name="acc_type" id="acc-type"
                                        class="form-control select2 {{ ($errors->has('acc_type')) ? 'is-invalid' : '' }}">
                                    <option disabled>-- खाताको प्रकार चयन गर्नुहोस् --</option>
                                    <option value="नियमित" {{ ($saving->acc_type == "नियमित") ? 'selected' : '' }}>
                                        नियमित
                                    </option>
                                    <option value="खुत्रुके" {{ ($saving->acc_type == "खुत्रुके") ? 'selected' : '' }}>
                                        खुत्रुके
                                    </option>
                                    <option value="ऐच्छिक" {{ ($saving->acc_type == "ऐच्छिक") ? 'selected' : '' }}>
                                        ऐच्छिक
                                    </option>
                                </select>
                                @if($errors->has('acc_type'))
                                    <div class="invalid-feedback">{{ $errors->first('acc_type') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row" id="acc-no">
                            <label class="control-label col-md-4 mt-2 text-right">खातावालाको खाता नम्बर</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-sort-numeric-up"></i></span>
                                    </div>
                                    <input type="number" name="acc_no"
                                           class="form-control {{ ($errors->has('acc_no')) ? 'is-invalid' : '' }}"
                                           placeholder="खातावालाको खाता नम्बर" value="{{ $saving->acc_no }}">
                                    @if($errors->has('acc_no'))
                                        <div class="invalid-feedback">{{ $errors->first('acc_no') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">खातावालाको आईडी</label>
                            <div class="col-md-8">
                                <select name="share_id" id="share-id" class="form-control select2">
                                    <option value="" selected> -- खातावालाको आईडी चयन गर्नुहोस् --</option>
                                    @foreach ($nos as $no)
                                        <option value="{{ $no }}" {{ ($saving->share->no == $no) ? "selected" : ""}}>{{ $no }}</option>
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
                            <label class="control-label col-md-4 mt-2 text-right">सेयर ब्यालेन्स</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-money-bill-wave"></i></span>
                                    </div>
                                    <input type="number" name="balance"
                                           class="form-control {{ ($errors->has('balance')) ? 'is-invalid' : '' }}"
                                           placeholder="सेयर ब्यालेन्स" id="balance" value="{{ old('balance') }}" readonly>
                                    @if($errors->has('balance'))
                                        <div class="invalid-feedback">{{ $errors->first('balance') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">खातावालाले दिएका कुल रकम</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-money-bill-alt"></i></span>
                                    </div>
                                    <input type="number" name="money"
                                           class="form-control {{ ($errors->has('money')) ? 'is-invalid' : '' }}"
                                           placeholder="खातावालाले दिएका कुल रकम" value="{{ old('money', $saving->money) }}">
                                    @if($errors->has('money'))
                                        <div class="invalid-feedback">{{ $errors->first('money') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">कुल ब्याजदर</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                    </div>
                                    <input type="number" name="interest"
                                           class="form-control {{ ($errors->has('interest')) ? 'is-invalid' : '' }}"
                                           placeholder="कुल ब्याजदर" value="{{ $saving->interest }}">
                                    @if($errors->has('interest'))
                                        <div class="invalid-feedback">{{ $errors->first('interest') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right"> खाता सिर्जना को मिति</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" name="creation_date" id="nepaliDate10"
                                        class="form-control {{ ($errors->has('creation_date')) ? 'is-invalid' : '' }}" value="{{ $saving->creation_date }}">
                                    @if($errors->has('creation_date'))
                                        <div class="invalid-feedback">{{ $errors->first('creation_date') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">विवरण</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-sticky-note"></i></span>
                                    </div>
                                    <input type="text" name="description"
                                        class="form-control" placeholder="विवरण">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">कैफियत</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
                                    </div>
                                    <input type="text" name="remarks"
                                        class="form-control" placeholder="कैफियत">
                                </div>
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

            $("#acc-no").hide();
            
            $(".select2").select2();

            $("#acc-type").change(function() {
                if ($("#acc-type").val() == "ऐच्छिक") {
                    $("#acc-no").show();
                } else {
                    $("#acc-no").hide();
                }
            });

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
