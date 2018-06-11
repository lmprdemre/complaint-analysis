<?php

namespace App\Http\Controllers;

use App\Models\ProductModels;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Handlers\ErrorHandler;
use App\Helpers\Utility;
use Illuminate\Support\Facades\Validator;

class ProductModelCtrl extends Controller
{
    public $createValidate = [
        'product_id' => 'bail|required',
        'model_name' => 'bail|required'
    ];

    //CRUD
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),$this->createValidate);
        if ($validator->fails()) {
            $error = Utility::formatErrorsArray($validator);
            return response()->json($error);
        }

        $product = new ProductModels();
        $product->product_id = trim($request->product_id);
        $product->model_name = trim($request->model_name);
        $product->c_count = 0;

        $product->save();
        $product->id = $product->_id;
        $product->save();
        return response()->json($product);
    }
}
