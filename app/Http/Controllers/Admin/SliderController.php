<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Support\File;

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
            $uploafPath = 'uploads/sliders/';
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . $ext;
            $file->move('uploads/sliders/', $filename);
            $slider->image =  $uploafPath . $filename;
        }
        $slider->title = $validatedData['title'];
        $slider->description = $validatedData['description'];

        $slider->status = $request->status == true ? '1' : '0';
        $slider->save();
        return redirect('admin/sliders')->with('message', 'Successfull');
    }
}