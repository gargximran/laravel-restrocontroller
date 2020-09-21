<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    public function owner(){
        return $this->belongsTo(RestroOwner::class, 'user_id', 'user_id');
    }
}
