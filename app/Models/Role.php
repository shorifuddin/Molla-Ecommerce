<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Role extends Model
{
    public function roleinfo(){
        return $this->belongsTo('App\Models\User', 'role_id', 'role');
    }
    use HasFactory;
}
