<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $furniture = Furniture::simplePaginate(4);
        return view('index', compact('furniture'));
    }

    public function viewFurniture(){
        $data = Furniture::paginate(4);
        return view('frontend.view', compact('data'));
    }

    public function search_furniture(Request $request){
        $search_query = $request->query('search');
        $data = Furniture::where('name', "LIKE", "%$search_query%")->paginate(4)->appends(['search'=>$search_query]);
        return view('frontend.view', compact('data'));
    }

    public function detail_furniture($id)
    {
        $furniture = Furniture::find($id);
        if (!$furniture) {
            return redirect('/');
        }
        return view('frontend.detail', compact('furniture'));
    }
}
