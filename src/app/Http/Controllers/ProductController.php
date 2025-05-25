<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Models\Product_seasons;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(){
        $items = Product::all();
        return view('products', compact('items'));
    }

    public function register(){
    $seasons = Season::all();
    return view('register', compact('seasons'));
}


    public function store(ProductRequest $request){
            $imgname = $request -> file('image') -> getClientOriginalName();
            $save = $request -> file('image') -> storeAs('images',$imgname,'public');

            $product_data = new Product();
            $product_data->name = $request -> input('name');
            $product_data->price = $request -> input('price');
            $product_data->image = $imgname;
            $product_data->description = $request -> input('description');

            $product_data->save();
            
            $product_seasons = $request -> input('season', []);
            $new_product_id = $product_data->id;
            foreach($product_seasons as $product_season){
                $product_season_data = new Product_seasons();
                $product_season_data->product_id = $new_product_id;
                $product_season_data->season_id = $product_season;
                $product_season_data->save();
            }
            return redirect('products');
        }

        public function detail($productId){
            $product = Product::find($productId);
            $season = Product_seasons::all();
            return view('detail',compact('product','season'));
        }


}


