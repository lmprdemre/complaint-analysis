<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branches;
use App\Models\Categories;
use App\Models\ProductModels;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnalysisCtrl extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->get('token') && $request->session()->get('id')){
            return view('admin.analysisIndex', [
                'user' => $request->user,
                'token' => $request->session()->get('token'),
            ]);
        }else{
            return redirect("/login" );
        }
    }

    public function statSindex(Request $request)
    {
        if($request->session()->get('token') && $request->session()->get('id')){
            $categoriesChart = (new Categories)->select(['name','c_count'])->orderBy('c_count','desc')->limit(3)->get()->toJson();
            $productsChart = (new Products)->select(['name','c_count'])->orderBy('c_count','desc')->limit(3)->get()->toJson();
            $branchesChart = (new Branches)->select(['name','c_count'])->orderBy('c_count','desc')->limit(3)->get()->toJson();

            $categoriesC = (new Categories)->select(['name','c_count'])->orderBy('c_count','desc')->get();
            $productsC = (new Products)->select(['name','c_count'])->orderBy('c_count','desc')->get();
            $productsMC = (new ProductModels)->select(['model_name','c_count'])->orderBy('c_count','desc')->get();
            $branchesC = (new Branches)->select(['name','c_count'])->orderBy('c_count','desc')->get();

            return view('admin.statsIndex', [
                'user' => $request->user,
                'token' => $request->session()->get('token'),
                'categoriesChart' => $categoriesChart,
                'productsChart' => $productsChart,
                'branchesChart' => $branchesChart,
                'categoriesC' => $categoriesC,
                'productsC' => $productsC,
                'productsMC' => $productsMC,
                'branchesC' => $branchesC
            ]);
        }else{
            return redirect("/login" );
        }
    }
}
