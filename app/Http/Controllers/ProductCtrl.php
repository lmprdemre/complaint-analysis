<?php

namespace App\Http\Controllers;

use App\Api\NLP\NLPAPI;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Handlers\ErrorHandler;
use App\Helpers\Utility;
use Illuminate\Support\Facades\Validator;

class ProductCtrl extends Controller
{
    public $createValidate = [
        'name' => 'bail|required|unique:products,name'
    ];

    //CRUD
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),$this->createValidate);
        if ($validator->fails()) {
            $error = Utility::formatErrorsArray($validator);
            return response()->json($error);
        }

        $product = new Products;
        $product->name = trim($request->name);

        //Process message with NLP API.
        $api = collect((new NLPAPI)->getNlpWords(trim($request->name))->json_response);

        //Get roots of words that user entered from NLP API.
        $keywords = [];
        foreach ($api['Keywords'] as $word) {
            $keywords[] = strtolower($word->KeywordRoot);
        }

        //$keywords = explode(" ", trim($request->keywords));
        $product->keywords = $keywords;
        $product->c_count = 0;

        $product->save();
        $product->id = $product->_id;
        $product->save();
        return response()->json($product);
    }

    public function readAll()
    {
        $products = Products::all();

        return response()->json($products);
    }
}
