<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Furniture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class FurnitureController extends Controller
{
    public function fun()
    {
        return view('admin/product/add');
    }

    public function insertFurniture(Request $request){
        $furnitures = new Furniture();

        $request->validate([
            'name' => ['required', 'string', 'max:15', 'unique:furniture'],
            'price' => ['required', 'numeric', 'min:5000', 'max:10000000'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg'],
        ]);

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('images/',$filename);
            $furnitures->image = $filename;
        }

        $furnitures->name = $request->input('name');
        $furnitures->price = $request->input('price');
        $furnitures->type = $request->input('type');
        $furnitures->color = $request->input( 'color');

        $furnitures->save();
        return redirect( '/');
    }

    public function update_furniture(Request $request, $id){
        $furniture = Furniture::find($id);

        if ($request->hasFile('image')){
            $path = 'images/'.$furniture->image;
            if (File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('images/',$filename);
            $furniture->image = $filename;
        }

        $furniture->name = $request->name != null ? $request->name : $furniture->name;
        $furniture->price = $request->input('price');
        $furniture->type = $request->input('type');
        $furniture->color = $request->input('color');

        $furniture->save();
        return redirect('/');
    }

    public function edit_furniture($id){
        $furniture = Furniture::find($id);
        return view('admin.product.update', compact('furniture'));
    }

    public function delete_furniture(Request $request, $id)
    {
        Furniture::find($id)->delete();
        return redirect('/');
    }
}
