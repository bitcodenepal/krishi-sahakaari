<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Share;
use Carbon\Carbon;
use App\Services\NepaliCalender;
use Illuminate\Support\Facades\Auth;

class Balance extends Model
{
    protected $fillable = ['user_id', 'share_no', 'receipt', 'description', 'kittaa', 'balance', 'withdraw', 'deposit', 'remarks', 'creation_date'];

    public function share() {
        return $this->belongsTo(Share::class, 'no');
    }

    public function getCreatedDateAttribute() {
        $date = $this->created_at;
        $year = (int) Carbon::parse($date)->format('Y');
        $month = (int) Carbon::parse($date)->format('m');
        $day = (int) Carbon::parse($date)->format('d');
        $nepali_date = new NepaliCalender;
        $converted_date = $nepali_date->engToNep($year, $month, $day);
        $date = $converted_date['year'] . "-" . $converted_date['month'] . "-" . $converted_date['date'];
        return $date;
    }

    public function scopeUserId($query) {
        return $query->where('user_id', Auth::user()->id);
    }

    public function scopeShareNo($query, int $id) {
        return $query->where('share_no', $id);
    }
}
