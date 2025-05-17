<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Models\Product_seasons;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(){
        $items = Product::all();
        $items = Product::simplePaginate(6);       
        return view('products',compact('items'));
    }

    public function search(Request $request){
        $word = Product::with('') -> KeywordSearch($request -> keyword) -> get();
        /*orderBy('price', $request -> order);*/
        return view('products', compact('word'));
    }


    public function register(){
        $seasons = Season::all();
        return view('register', compact('seasons'));
    }



    public function store(ProductRequest $request){
        $product = $request ->all();
        $imgname = $request -> file('image') -> getClientOriginalName();
        $save = $request -> file('image') -> storeAs('',$imgname,'public');
        $product['image'] = $imgname;
        Product::create($product);
        
        $season = $request -> only(['season_id']);
        /*$season_ids = $request -> only(['season_id']);
        foreach ($season_ids as $season_id)
            $product_id = Product::where('name','$request->name') -> value('id');
            $new_culumn = array('season_id','product_id');
            Product_seasons::create();*/


        return redirect('products');
    }



    public function detail($productId){
        $product = Product::find($productId);
        $season = Product_seasons::all();
        return view('detail',compact('product','season'));
    }

    public function update(ProductRequest $request,$productId){
        $product = $request -> all();
        Product::find($request -> id) ->update($product);
        return redirect('detail');
    }
 
    public function destroy(Request $request){
        Product::find($request -> id)->delete();
        return redirect('products');
    }


    
}
