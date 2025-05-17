<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Models\Product_seasons;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $items = Product::all();
        $items = Product::simplePaginate(6);
        return view('products',compact('items'));
    }

    public function search(Request $request){
        $word = Product::with('season') -> KeywordSearch($request -> keyword) -> get();
        $products = Product::all();
        return view('products', compact('word'));
    }
    /*public function */




    public function register(){
        $seasons = Season::all();
        return view('register', compact('seasons'));
    }



    public function store(Request $request){
        $product = $request ->all();
        $imgname = $request -> file('image') -> getClientOriginalName();
        $save = $request -> file('image') -> storeAs('',$imgname,'public');
        $product['image'] = $imgname;
        Product::create($product);
        $thumbnailPath = 'thumbnails/' . $imgname;
        $imageFile->coverDown(300, 300); // 要トリミング（元のサイズを超えないように）
        Storage::disk('public')->put($thumbnailPath, $imageFile->encode());
        $image->thumbnail_path = $thumbnailPath;
        $image->save();

        
        $season = $request -> only(['season_id']);

        /*$season_ids = $request -> only(['season_id']);
        foreach ($season_ids as $season_id)
            $product_id = Product::where('name','$request->name') -> value('id');
            $new_culumn = array('season_id','product_id');
            Product_seasons::create();*/


        return redirect('products');
    }



    public function detail($productsId){
        $product = Product::find($productsId);
        $season = Product_seasons::all();
        return view('detail',compact('product','season'));
    }

    public function update(Request $request){
        $product = $request -> only(['id','image','name','price','description']);
        Product::find($request -> id) ->update($product);
        return redirect('detail');
    }
 
    public function destroy(Request $request){
        Product::find($request->id)->delete();
        return redirect('detail');
    }


    
}
