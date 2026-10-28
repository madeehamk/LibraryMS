<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Borrow;

class Member extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'membership_number',
        'membership_expiration',

        'status',

    ];

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
