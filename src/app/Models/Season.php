<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
    protected $guarded =['name'];



    public function product_season(){
        return $this -> belongsToMany(Product::class);
    }

}
