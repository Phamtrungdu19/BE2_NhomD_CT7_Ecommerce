<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use Livewire\Livewire;

class FrontendController extends Controller
{
   public function index()
   {
      $sliders = Slider::where('status', '0')->get();
      $trendingProduct = Product::where('trending', '1')->latest()->take(15)->get();
      return view('frontend.index', compact('sliders', 'trendingProduct'));
   }
   public function searchProduct(Request $request)
   {
      if ($request->search) {
         $searchProduct = Product::where('name', 'LIKE', '%' . $request->search . '%')->latest()->paginate(15);
         return view('frontend.pages.search', compact('searchProduct'));
      } else {
         return redirect()->back()->with('message', 'Empty Search');
      }
   }
   public function newArrival()
   {
      $newArivalProduct = Product::latest()->take(6)->get();
      return view('frontend.pages.new-arrival', compact('newArivalProduct'));
   }
   public function categories()
   {
      $categories = Category::where('status', '0')->get();
      return view('frontend.collections.category.index', compact('categories'));
   }

   
   public function products($category_slug)
   {
      $category = Category::where('slug', $category_slug)->first();
      if ($category) {
         $products = $category->products()->get();
         return view('frontend.collections.products.index', compact('products', 'category'));
      } else {
         return redirect()->back();
      }
   }
   public function productView($category_slug, $product_slug)
   {
      $category = Category::where('slug', $category_slug)->first();
      if ($category) {
         $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
         if ($product) {
            return view('frontend.collections.products.view', compact('product', 'category'));
         } else {
            return redirect()->back();
         }
      } else {
         return redirect()->back();
      }
   }
}