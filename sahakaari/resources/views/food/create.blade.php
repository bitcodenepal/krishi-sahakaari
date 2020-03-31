@extends('layouts.master')

@section('content')

    <div class="app-title">
        <h1><a href="{{ route('food.index') }}"><i class="fa fa-arrow-circle-left fa-fw"></i></a>
            &nbsp;&nbsp;&nbsp;अन्नको विवरण थप्नुहोस्
        </h1>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="tile">
                <form action="{{ route('food.store') }}" class="form-horizontal" method="POST">
                    @csrf
                    <div class="tile-body">

                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right"> किसानको नाम</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" name="name"
                                        class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" placeholder="किसानको नाम" value="{{ old('name') }}">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">स्थाई ठेगाना</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-map-marked-alt"></i></span>
                                    </div>
                                    <input type="text" name="address"
                                           class="form-control {{ ($errors->has('address')) ? 'is-invalid' : '' }}"
                                           placeholder="स्थाई ठेगाना" id="address" value="{{ old('address') }}">
                                    @if($errors->has('address'))
                                        <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right">सम्पर्क नम्बर</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text" name="contact_no"
                                           class="form-control {{ ($errors->has('contact_no')) ? 'is-invalid' : '' }}"
                                           placeholder="सम्पर्क नम्बर" id="contact-no" value="{{ old('contact_no') }}">
                                    @if($errors->has('contact_no'))
                                        <div class="invalid-feedback">{{ $errors->first('contact_no') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right"> अन्नको प्रकार</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-seedling"></i></span>
                                    </div>
                                    <input type="text" name="variety"
                                        class="form-control {{ ($errors->has('variety')) ? 'is-invalid' : '' }}" placeholder="अन्नको प्रकार" value="{{ old('variety') }}">
                                    @if($errors->has('variety'))
                                        <div class="invalid-feedback">{{ $errors->first('variety') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right"> अन्नको प्रजाति</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-spa"></i></span>
                                    </div>
                                    <input type="text" name="species"
                                        class="form-control {{ ($errors->has('species')) ? 'is-invalid' : '' }}" placeholder="अन्नको प्रजाति" value="{{ old('species') }}">
                                    @if($errors->has('species'))
                                        <div class="invalid-feedback">{{ $errors->first('species') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-4 mt-2 text-right"> तौल</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-balance-scale"></i></span>
                                    </div>
                                    <input type="text" name="weight"
                                        class="form-control {{ ($errors->has('weight')) ? 'is-invalid' : '' }}" placeholder="तौल" value="{{ old('weight') }}">
                                    @if($errors->has('weight'))
                                        <div class="invalid-feedback">{{ $errors->first('weight') }}</div>
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
                                    <input type="number" name="amount" id="amount"
                                           class="form-control {{ ($errors->has('amount')) ? 'is-invalid' : '' }}"
                                           placeholder="रकम लेख्नुहोस्" value="{{ old('amount') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-success float-right" type="submit"><i
                                        class="fa fa-fw fa-lg fa-check-circle"></i>थप्नुहोस्
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection