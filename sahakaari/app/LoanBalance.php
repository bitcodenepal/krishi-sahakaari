<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Services\NepaliCalender;

class LoanBalance extends Model
{
    protected $fillable = ['user_id', 'loan_id', 'amount', 'payment', 'interest', 'extra_interest', 'remarks', 'creation_date'];

    public function getCreatedDateAttribute() {
        $date = $this->created_at;
        $year = (int) Carbon::parse($date)->format('Y');
        $month = (int) Carbon::parse($date)->format('m');
        $day = (int) Carbon::parse($date)->format('d');
        $nepali_date = new NepaliCalender;
        $converted_date = $nepali_date->engToNep($year, $month, $day);
        $date = $converted_date['year'] . "/" . $converted_date['month'] . "/" . $converted_date['date']. "-" . $converted_date['day'];
        return $date;
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
}
