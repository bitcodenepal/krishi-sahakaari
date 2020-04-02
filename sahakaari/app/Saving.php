<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Share;
use App\SavingBalance;
use Illuminate\Support\Facades\Auth;

/**
 * @package: App
 * @author: Shashank Jha <shashankj677@gmail.com>
 */

class Saving extends Model
{
    protected $fillable = ['user_id', 'acc_type', 'share_id', 'money', 'interest_amount', 'acc_no', 'creation_date', 'description', 'remarks', 'saving_amount'];

    public function share() {
        return $this->belongsTo(Share::class, 'share_no');
    }

    public function savingBalances()
    {
        return $this->hasMany(SavingBalance::class);
    }

    public function delete() {
        $this->savingBalances()->delete();
        return parent::delete();
    }

    public function scopeUserId($query){
        return $query->where('user_id', Auth::user()->id);
    }

    public function scopeAccType($query, $accType){
        return $query->where('acc_type', $accType);
    }
}
