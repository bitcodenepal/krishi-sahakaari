<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Saving;
use Carbon\Carbon;
use App\Services\NepaliCalender;

class SavingBalance extends Model
{
    protected $fillable = ['user_id','saving_id', 'description', 'balance', 'withdraw', 'deposit', 'remarks', 'creation_date'];

    public function savings() {
        return $this->belongsTo(Saving::class);
    }

    public function getCreatedDateAttribute() {
        $date = $this->created_at;
        $year = (int) Carbon::parse($date)->format('Y');
        $month = (int) Carbon::parse($date)->format('m');
        $day = (int) Carbon::parse($date)->format('d');
        $nepali_date = new NepaliCalender;
        $converted_date = $nepali_date->engToNep($year, $month, $day);
        $date = $converted_date['year'] . "/" . $converted_date['month'] . "/" . $converted_date['date'];
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
