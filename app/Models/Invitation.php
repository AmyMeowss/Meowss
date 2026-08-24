<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Invitation extends Model
{
    public $fillable = [
        'code',
        'isUsed',
        'user_od'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
