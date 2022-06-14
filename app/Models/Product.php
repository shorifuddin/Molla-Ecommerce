<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{

    public function category(){
        return $this->belongsTo(Prodcategory::class, 'pro_category_id','pro_cate_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id','brand_id');
    }
    use HasFactory;
}
