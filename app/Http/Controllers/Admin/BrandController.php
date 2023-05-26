<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BrandFormRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands','categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.brands.create',compact('categories'));
    }

    public function store(BrandFormRequest $request)
    {
        $validatedData = $request->validated();
        $brand = new Brand();
        $category = Category::find($validatedData['category_id']);
        $brand =  $category->brands()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'status' =>  $request->status == true ? '1' : '0',
        ]);
        // $brand->name = $validatedData['name'];
        // $brand->slug = Str::slug($validatedData['slug']);
        // $brand->status = $request->status == true ? '1' : '0';
        // $brand->save();
        return redirect('admin/brands')->with('message', 'Brands Add Successfullly');
    }
}
