<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductModels;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsCtrl extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->get('token') && $request->session()->get('id')){
            $produts = Products::all();
            return view('admin.productsIndex', [
                'user' => $request->user,
                'token' => $request->session()->get('token'),
                'products' => $produts
            ]);
        }else{
            return redirect("/login" );
        }
    }

    public function editIndex(Request $request,$id)
    {
        if($request->session()->get('token') && $request->session()->get('id')){
            $product = Products::find($id);
            $models = ProductModels::where('product_id', $id)->get();
            return view('admin.productsEditIndex', [
                'user' => $request->user,
                'token' => $request->session()->get('token'),
                'product' => $product,
                'models' => $models
            ]);
        }else{
            return redirect("/login" );
        }
    }

    public function deleteModel($id)
    {
        $model = ProductModels::find($id);
        $model->delete();

        return redirect()->back();
    }
}
