<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }
    public function create()
    {
        return view('admin.colors.create');
    }
    public function store(ColorFormRequest $request)
    {
        $validatedData = $request->validated();
        $color = new Color();
        $color->name = $validatedData['name'];
        $color->code = $validatedData['code'];
        $color->status = $request->status == true ? '1' : '0';
        $color->save();
        return redirect('admin/colors')->with('message', 'color Add Successfullly');
    }
    public function edit(Color $color)
    {
        return view('admin.colors.edit', compact('color'));
    }

    public function update(ColorFormRequest $request, $color_id)
    {
        $validatedData = $request->validated();
        $color = Color::find($color_id);
        $color->name = $validatedData['name'];
        $color->code = $validatedData['code'];
        $color->status = $request->status == true ? '1' : '0';
        $color->update();
        return  redirect('admin/colors')->with('message', 'color edit Successfullly');
    }

    public function destroy($color_id)
    {
        $color = Color::findOrFail($color_id);
        $color->delete();
        return  redirect('admin/colors')->with('message', 'color delete Successfullly');
    }
}
