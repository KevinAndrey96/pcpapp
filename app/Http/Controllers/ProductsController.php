<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\PriceList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;



class ProductsController extends Controller
{


    public function index(Request $request, $id)
    {

        $products = Product::where('list_id','=',$id)->get();
        $list = PriceList::findOrFail($request->id);




        return view('products.index',compact('products','list'));

    }



    public function create(Request $request,$id)

    {

        $list = PriceList::findOrFail($request->id);

        return view('products.create',compact('list'));
    }


    public function store(Request $request)
    {
        
        $fields = [

            'name' =>'required|string|max:100',
            'price' =>'required',
            
        ];

        $message = ["required" => "El campo :attribute es requerido"];
        $this -> validate($request, $fields, $message);
        

        $product = request()->except('_token');

        Product::insert($product);

        return redirect('/products/create/'.$request->list_id)->with('messageSuccess','Producto registrado con éxito');;    



    }

    /**
     * @param int $a
     * @param int $b
     * @return int
     */
    public function sum(int $a, int $b): int
    {

        return $a+$b;

    }

    public function edit($id)
    {

        $product = Product::findOrFail($id);

        return view('products.edit',compact('product'));


    }


    public function update( Request $request, $id)
    {

        $producttData = request()->except(['_token','_method']);
        Product::where('id','=',$id)->update($producttData);

        return redirect('home')->with('Mensaje','El producto ha sido modificada con éxito');

    }

    public function destroy($id)
    {

        if(Auth::user()->role=='Administrador'){

            Product::destroy($id);

            }

            return view('home');


    }




    public function productsDistriIron(){
        
        $listId = Auth::user()->price_list_id;
        $products = Product::where('list_id','=',$listId)->get();

        return view('productsDistIron.index', compact('products'));

    }

    public function export($id) 
    {
        $list = PriceList::findOrFail($id);

        return Excel::download(new ProductsExport($id), $list->name.'.xlsx');
    }

    public function import(Request $request, $id){


        $file = $request->file('list');

        Excel::import(new ProductsImport($id), $file);

        return back()->with('message', 'Importación de productos satisfactoria');
    }



}
