<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Harvester extends Model
{
    protected $fillable = ['user_id', 'name', 'address', 'contact_no', 'use_address', 'use_date', 'amount', 'description'];

    public function scopeUserId($query){
        return $query->where('user_id', Auth::user()->id);
    }
}
