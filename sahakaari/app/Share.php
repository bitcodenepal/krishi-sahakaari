<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Balance;
use Illuminate\Support\Facades\Auth;

class Share extends Model
{
    protected $fillable = ['user_id','name', 'address', 'no', 'contact_no', 'grandfather_name', 'father_name', 'gender', 'marital_status', 'spouce_name', 'inheritant', 'image', 'creation_date'];

    public function balances() {
        return $this->hasMany(Balance::class, 'share_no');
    }

    public function delete() {
        $this->balances()->delete();
        return parent::delete();
    }

    public function scopeNo($query, int $no) {
        return $query->where('no', $no);
    }
    
    public function scopeUserId($query) {
        return $query->where('user_id', Auth::user()->id);
    }

}
