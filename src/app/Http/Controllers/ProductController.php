<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Models\Product_Season;

class ProductController extends Controller
{
    public function index(){
        $items = Product::all();
        return view('products',compact('items'));
    }

    public function search(Request $request){
        $word = Product::with('season') -> KeywordSearch($request -> keyword) -> get();
        $products = Product::all();
        return view('products', compact('word'));
    }
    

    public function register(){
        $seasons = Season::all();

        return view('register', compact('seasons'));
    }

    public function store(Request $request){
        $product = $request -> only(['name','price','season_id','description']);
        $file = $request -> file('image');
        $seasons = Season::find($request->season_id);
        Product::create($product);
        return view('products',compact('file','seasons'));
    }



    
}
