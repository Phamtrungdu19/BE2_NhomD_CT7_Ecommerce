<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Livewire\Livewire;
use Illuminate\Support\Facades\File;

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
        return redirect('admin/slider')->with('message', 'Successfull');
    }
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderFormRequest $request, $slider_id)
    {
        $validatedData = $request->validated();
        $slider = Slider::find($slider_id);
        $slider->title = $validatedData['title'];
        $slider->description = $validatedData['description'];
        $uploafPath = 'uploads/sliders/';
        if ($request->hasFile('image')) {

            $path = 'uploads/sliders/' . $slider->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . $ext;
            $file->move('uploads/sliders/', $filename);
            $slider->image = $uploafPath . $filename;
        }
        $slider->status = $request->status == true ? '1' : '0';
        $slider->update();
        return  redirect('admin/slider')->with('message', 'slider edit Successfullly');
    }

    public function destroy($slider_id)
    {
        $color = Slider::findOrFail($slider_id);
        $color->delete();
        return  redirect('admin/slider')->with('message', 'slider delete Successfullly');
    }
}
