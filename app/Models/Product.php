<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{

    public function category(){
        return $this->belongsTo(Prodcategory::class, 'product_id','pro_cat_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id','brand_id');
    }
    use HasFactory;
}
