<?php

namespace App\Http\Controllers;

use App\Api\NLP\NLPAPI;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Handlers\ErrorHandler;
use App\Helpers\Utility;
use Illuminate\Support\Facades\Validator;

class CategoriesCtrl extends Controller
{
    public $createValidate = [
        'name' => 'bail|required',
        'keywords' => 'bail|required',
    ];


    //CRUD
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),$this->createValidate);
        if ($validator->fails()) {
            $error = Utility::formatErrorsArray($validator);
            return response()->json($error);
        }

        $categories = new Categories();
        $categories->name = trim($request->name);

        //Process message with NLP API.
        $api = collect((new NLPAPI)->getNlpWords(trim($request->keywords))->json_response);

        //Get roots of words that user entered from NLP API.
        $keywords = [];
        foreach ($api['Keywords'] as $word) {
            $keywords[] = strtolower($word->KeywordRoot);
        }

        //$keywords = explode(" ", trim($request->keywords));
        $categories->keywords = $keywords;
        $categories->c_count = 0;

        $categories->save();
        $categories->id = $categories->_id;
        $categories->save();
        return response()->json($categories);
    }

    public function readAll()
    {
        $categries = Categories::all();

        return response()->json($categries);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),$this->createValidate);
        if ($validator->fails()) {
            $error = Utility::formatErrorsArray($validator);
            return response()->json($error);
        }

        $category = (new Categories)->find(trim($request->id));
        if (isset($request->name)){
            $category->name = trim($request->name);
        }
        if(isset($request->keywords)){
            //Process message with NLP API.
            $api = collect((new NLPAPI)->getNlpWords(trim($request->keywords))->json_response);

            //Get roots of words that user entered from NLP API.
            $keywords = [];
            foreach ($api['Keywords'] as $word) {
                $keywords[] = strtolower($word->KeywordRoot);
            }

            //$keywords = explode(" ", trim($request->keywords));
            $category->keywords = $keywords;
        }

        $category->save();
        return response()->json($category);
    }
}
