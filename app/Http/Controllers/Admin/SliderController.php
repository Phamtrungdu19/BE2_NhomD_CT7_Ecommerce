<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }
    public function create()
    {
        return view('admin.slider.create');
    }
    public function store(SliderFormRequest $request)
    {
        $validatedData = $request->validated();
        $slider = new Slider();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/slider/', $filename);
            $slider->image = $validatedData['image'];
        }
        $slider->title = $validatedData['title'];
        $slider->description = $validatedData['description'];
        $slider->image = $validatedData['image'];
        $slider->status = $request->status == true ? '1' : '0';
        $slider->save();
        return redirect('admin/sliders')->with('message', 'Successfull');
    }
}