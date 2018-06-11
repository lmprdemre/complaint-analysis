<?php

namespace App\Http\Controllers;

use App\Api\NLP\NLPAPI;
use App\Models\Branches;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Handlers\ErrorHandler;
use App\Helpers\Utility;
use Illuminate\Support\Facades\Validator;

class BranchesCtrl extends Controller
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

        $branch = new Branches;
        $branch->name = trim($request->name);
        $branch->keywords = trim(strtolower($request->name));
        $branch->c_count = 0;

        $branch->save();
        $branch->id = $branch->_id;
        $branch->save();
        return response()->json($branch);
    }

    public function readAll()
    {
        $branches = Branches::all();

        return response()->json($branches);
    }
}
