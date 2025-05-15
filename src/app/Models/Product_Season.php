<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Season extends Model
{
    use HasFactory;

    protected $fillable =['id','product_id','season_id'];

    public function seasons(){
        return $this -> belongsToMany(Season::class);
    }
    public function products(){
        return $this -> belongsToMany(Product::class);
    }
}
