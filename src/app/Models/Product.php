<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =['name','price','image','season_id','description'];


 


    public function seasons(){
        return $this -> belongsToMany(Season::class);
    }


    public function scopeKeywordSearch($query, $keyword){
        if (!empty($keyword)) {
        $query->where('description', 'like', '%' . $keyword . '%');
        }
    }
}
