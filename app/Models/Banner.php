<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public function creator(){
        return $this->belongsTo('app\Models\User','ban_creator','id');
    }
    use HasFactory;
}
