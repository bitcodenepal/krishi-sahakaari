@extends('layouts.master')

@section('content')
    
  <div class="app-title">
    <h1><a href="{{ route('savings.index') }}"><i class="fa fa-arrow-circle-left fa-fw"></i></a>
        &nbsp;&nbsp;&nbsp; {{ $loan->share->name }}को विवरण (खाताको प्रकार => {{ $loan->loan_type}})
    </h1>
  </div>

  <div class="row">
    <div class="col-md-12">
        <div class="tile">
          <button class="btn btn-sm btn-primary float-right mb-3" data-toggle="modal" data-target="#change-balance"><i class="fa fa-times-circle fa-fw"></i> Loan Payment</button>
          <table class="table table-sm table-bordered table-hover">
            <thead class="bg-danger text-white">
              <tr>
                <th>मिति</th>
                <th>ऋण अवधि</th>
                <th>रकम</th>
                <th>ऋण राशि</th>
                <th>ब्याजदर</th>
                <th>थप ब्याजदर</th>
                <th>ब्याज राशि</th>
                <th>ब्याज सहित राशि</th>
                <th>कैफियत</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($loan_balances as $balance)
                  <tr>
                    <td width="75px"><span class="badge badge-pill badge-info" style="font-size: 14px;">{{ ($balance->creation_date) ? $balance->creation_date : $balance->created_date }}</span></td>
                    <td>{{ ($balance->loan_duration != 0 ) ? $balance->loan_duration. " days" : $loan_duration. " days" }}</td>
                    <td>Rs. {{ ($balance->payment == null) ? 0 : $balance->deposit }}</td>
                    <td>Rs. {{ $balance->amount }}</td>
                    <td>{{ $balance->interest }} %</td>
                    <td>{{ ($balance->extra_interest == null) ? "0 %" :  $balance->extra_interest}}</td>
                    <td>Rs. {{ ($balance->interest_amount != 0) ? $balance->interest_amount : $interest_amount }}</td>
                    <td>Rs. {{ ($balance->loan_amount != 0) ? $balance->loan_amount : $loan_amount }}</td>
                    <td>{{ $balance->remarks }}</td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
</div>

<!-- Modal -->
<div class="modal" id="change-balance">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border-radius: 0px;">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white"> फारम</h5>
        <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form action="{{ route('loan.balance', $loan->id) }}" method="POST">
        @csrf
        <input type="hidden" name="loan_duration" value="{{ $loan_duration }}">
        <input type="hidden" name="interest_amount" value="{{ $interest_amount }}">
        <input type="hidden" name="saving_amount" value="{{ $loan_amount }}">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label">रकम</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-money-bill"></i></span>
              </div>
              <input type="number" name="amount" placeholder="रकम" class="form-control" id="amount" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">ब्याजदर</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-percent"></i></span>
              </div>
              <input type="number" name="interest" placeholder="ब्याजदर" class="form-control" id="interest" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">थप ब्याजदर</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-percent"></i></span>
              </div>
              <input type="number" name="extra_interest" placeholder="थप ब्याजदर" class="form-control" id="extra_interest">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label"> मिति</label>
            <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar-alt"></i></span>
              </div>
              <input type="text" name="creation_date" id="nepaliDate10" class="form-control" placeholder="मिति (YYYY-MM-DD)">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label">कैफियत</label>
            <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-pencil-alt"></i></span>
              </div>
              <a rel="nofollow" href="http://naya.com.np"; title="Nepali Social Network" class="naya_convert">naya.com.np</a>
              <input type="text" name="remarks"
                  class="form-control" placeholder="कैफियत">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success" type="submit"><i
            class="fa fa-fw fa-lg fa-check-circle"></i> थप्नुहोस्</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- / -->

@endsection