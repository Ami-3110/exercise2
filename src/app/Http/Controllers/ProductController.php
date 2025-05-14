<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;

class ProductController extends Controller
{
    public function index($text = ""){
        $item = [
            'param' => $text
        ];
        return view('products',$item);
    }

    public function detail($productsId){

        return vier('products/$productId');
    }

    public function store(Request $request){
        $contact = $request -> only(['category_id','last_name','first_name','gender','email','tel','address','building','detail']);
        Product::create($contact);
        return view('thanks');
    }


/*検索
    public function search(Request $request){
    $contacts = Contact::simplePaginate(7);
    $contacts = Contact::with('category') -> KeywordSearch($request -> keyword) -> GenderSearch($request -> gender) -> CategorySearch($request -> category_id) -> DateSearch($request -> created_at)->get();
    $categories = Category::all();
    return view('admin', compact('contacts', 'categories'));
    }
    */
}
