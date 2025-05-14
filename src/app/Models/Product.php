<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =['name','price','description'];

    public function category(){
        return $this -> belongsTo(Category::class);
    }


    public function scopeKeywordSearch($query, $keyword){
        if (!empty($keyword)) {
        $query->where('detail', 'like', '%' . $keyword . '%');
        }
    }
}
