<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =['name','price','image','description'];

    public function protuct_season(){
        return $this -> belongsToMany(Seasons::class);
    }

    public function scopeKeywordSearch($query, $keyword){
        if (!empty($keyword)) {
        $query->where('description', 'like', '%' . $keyword . '%');
        }
    }



}
