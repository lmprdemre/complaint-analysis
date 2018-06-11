<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesCtrl extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->get('token') && $request->session()->get('id')){
            return view('admin.categoriesIndex', [
                'user' => $request->user,
                'token' => $request->session()->get('token'),
            ]);
        }else{
            return redirect("/login" );
        }
    }

    public function editIndex(Request $request,$id)
    {
        if($request->session()->get('token') && $request->session()->get('id')){
            $category = (new Categories)->find($id);

            $keyword_str = '';
            foreach ($category['keywords'] as $keyword){
                $keyword_str .= $keyword . ' ';
            }
            return view('admin.categoriesEdit', [
                'user' => $request->user,
                'token' => $request->session()->get('token'),
                'category' => $category,
                'keyword_str' => trim($keyword_str),
                'id' => $id
            ]);
        }else{
            return redirect("/login" );
        }
    }
}
