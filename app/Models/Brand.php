<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Brand extends Model{
    public function creatorinfo(){
        return $this->belongsTo('App\Models\User', 'brand_creator', 'id');
    }
    protected $fillable = [
        'brand_name',
        'brand_remaks',
        'brand_image',
    ];
    use HasFactory;
    
}
