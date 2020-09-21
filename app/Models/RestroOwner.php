<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestroOwner extends Model
{
    use HasFactory;

    public function subscription(){
        return $this->hasMany(Subscription::class, 'user_id', 'user_id');
    }
}