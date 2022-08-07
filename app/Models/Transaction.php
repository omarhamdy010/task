<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function from(){
        return $this->belongsTo(User::class, 'from', 'id');
    }

    public function user_id(){
        return $this->belongsTo(User::class, 'to', 'id');
    }

}
