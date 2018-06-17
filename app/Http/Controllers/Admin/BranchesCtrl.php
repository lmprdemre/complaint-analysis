<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branches;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BranchesCtrl extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->get('token') && $request->session()->get('id')){
            return view('admin.branchesIndex', [
                'user' => $request->user,
                'token' => $request->session()->get('token'),
            ]);
        }else{
            return redirect("/login" );
        }
    }

    public function delete($id)
    {
        $branch = (new Branches())->find($id);
        $branch->delete();

        return redirect()->back();
    }
}
