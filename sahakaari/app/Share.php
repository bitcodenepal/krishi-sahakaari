<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Balance;
use App\Saving;
use App\Loan;
use Illuminate\Support\Facades\Auth;

/**
 * @package: App
 * @author: Shashank Jha <shashankj677@gmail.com>
 */

class Share extends Model
{
    protected $fillable = ['user_id','name', 'address', 'no', 'contact_no', 'grandfather_name', 'father_name', 'gender', 'marital_status', 'spouce_name', 'inheritant', 'image', 'creation_date', 'receipt', 'kittaa', 'balance', 'description', 'remarks'];

    public function balances() {
        return $this->hasMany(Balance::class, 'share_no');
    }

    public function savings() {
        return $this->hasMany(Saving::class, 'share_no');
    }

    public function loans() {
        return $this->hasMany(Loan::class, 'share_no');
    }

    public function delete() {
        $this->balances()->delete();
        $this->savings()->delete();
        $this->loans()->delete();
        return parent::delete();
    }

    public function scopeNo($query, int $no) {
        return $query->where('no', $no);
    }
    
    public function scopeUserId($query) {
        return $query->where('user_id', Auth::user()->id);
    }

}
