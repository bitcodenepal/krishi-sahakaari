<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Food;
use Carbon\Carbon;
use App\Services\NepaliCalender;

class BuyNSell extends Model
{
    protected $fillable = ['food_id', 'type', 'weight', 'amount'];
    
    public function food()
    {
        return $this->belongsTo(Food::class);
    }

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
}
