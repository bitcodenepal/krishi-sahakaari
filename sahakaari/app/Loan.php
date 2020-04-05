<?php

namespace App;

use App\Services\NepaliCalender;
use Illuminate\Database\Eloquent\Model;
use App\Share;
use App\LoanBalance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Loan extends Model
{
    protected $fillable = ['user_id', 'share_no', 'loan_type', 'amount', 'interest', 'creation_date'];

    public function share() {
        return $this->belongsTo(Share::class, 'share_no');
    }

    public function loanBalances()
    {
        return $this->hasMany(LoanBalance::class);
    }

    public function scopeUserId($query){
        return $query->where('user_id', Auth::user()->id);
    }

    public function scopeLoanType($query, $value) {
        return $query->where('loan_type', $value);
    }

    public function getCreationAtAttribute() {
        $date = $this->creation_date;
        $year = (int) Carbon::parse($date)->format('Y');
        $month = (int) Carbon::parse($date)->format('m');
        $day = (int) Carbon::parse($date)->format('d');
        $engDate = new NepaliCalender;
        $convertedDate = $engDate->nepToEng($year, $month, $day);
        $newDate = $convertedDate['year'] . "/" . $convertedDate['month'] . "/" . $convertedDate['date'];
        return $newDate;
    }

    public function delete() {
        $this->loanBalances()->delete();
        return parent::delete();
    }
}
