<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Models\Product_season;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products', compact('products'));
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
                $product_season_data = new Product_season();
                $product_season_data->product_id = $new_product_id;
                $product_season_data->season_id = $product_season;
                $product_season_data->save();
            }
            return redirect('products');
        }


        public function detail($product_id){
            $product = Product::with('seasons')->find($product_id);
            $seasons = Season::all();
            return view('detail',compact('product','seasons'));
        }

        public function update(ProductRequest $request,$productId){           
            $product_data = Product::find($productId);
            if ($request->hasFile('image')) {
            $imgname = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images', $imgname, 'public');
            $product_data->image = $imgname;
            }
            $product_data->name = $request -> input('name');
            $product_data->price = $request -> input('price');
            $product_data->image = $imgname;
            
            $product_data->description = $request -> input('description');
            $product_data->save();
            
            $product_data->seasons()->sync($request->input('season', [] ));
                return redirect('products');
        }

}


