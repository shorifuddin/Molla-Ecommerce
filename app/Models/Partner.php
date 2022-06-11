<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public function creatorinfo(){
        return $this->belongsTo('App\Models\User', 'partner_creator', 'id');
    }
    use HasFactory;
}
