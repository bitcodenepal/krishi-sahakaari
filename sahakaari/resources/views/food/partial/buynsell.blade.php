<div class="modal-header bg-primary">
    <h5 class="modal-title text-white">खरीद/बिक्रि</h5>
    <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>

<form action="{{ route('update-buy-n-sell') }}" class="form-horizontal" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $food->id }}">
    <div class="modal-body">
        <div class="form-group row">
            <label class="control-label col-sm-4 mt-2 text-right">प्रक्रिया चयन गर्नुहोस्</label>
            <div class="col-sm-8">
                <select name="type" id="type" class="form-control select2 {{ ($errors->has('type')) ? 'is-invalid' : '' }}">
                    <option value="" selected>-- प्रक्रिया चयन गर्नुहोस् --</option>
                    <option value="खरीद">खरीद</option>
                    <option value="बिक्रि">बिक्रि</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-4 mt-2 text-right"> तौल</label>
            <div class="col-md-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-balance-scale"></i></span>
                    </div>
                    <input type="text" name="weight" class="form-control" placeholder="तौल">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-sm-4 mt-2 text-right">खरीद/बिक्रि मूल्य हाल्नुहोस्</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-money-bill"></i></span>
                    </div>
                    <input type="number" name="amount" placeholder="खरीद/बिक्रि मूल्य हाल्नुहोस्" class="form-control" id="amount" required>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-success" type="submit"><i
          class="fa fa-fw fa-lg fa-check-circle"></i> थप्नुहोस्</button>
    </div>
</form>