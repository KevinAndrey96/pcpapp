<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\PriceList;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    

    public function index(Request $request, $id)
    { 

        $list = PriceList::findOrFail($request->id);

        return view('products.index',compact('list'));
       
    }



    public function create(Request $request,$id)

    {

        $list = PriceList::findOrFail($request->id);

        return view('products.create',compact('list'));
    }


    public function store(Request $request) 
    {  

        $product = request()->except('_token');

        Product::insert($product);

        return view('home');

        
       
    }














}
