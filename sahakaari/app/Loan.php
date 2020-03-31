<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Share;
use Illuminate\Support\Facades\Auth;

class Loan extends Model
{
    protected $fillable = ['user_id', 'share_no', 'loan_type', 'amount', 'interest', 'creation_date'];

    public function share() {
        return $this->belongsTo(Share::class, 'share_no');
    }

    public function scopeUserId($query){
        return $query->where('user_id', Auth::user()->id);
    }

    public function scopeLoanType($query, $value) {
        return $query->where('loan_type', $value);
    }
}
