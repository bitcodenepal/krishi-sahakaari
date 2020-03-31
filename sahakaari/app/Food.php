<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BuyNSell;
use Illuminate\Support\Facades\Auth;

class Food extends Model
{
    protected $fillable = ['user_id', 'name', 'address', 'contact_no', 'variety', 'species', 'weight', 'amount'];
    
    public function buyNSells()
    {
        return $this->hasMany(BuyNSell::class);
    }

    public function scopeUserId($query){
        return $query->where('user_id', Auth::user()->id);
    }
}
