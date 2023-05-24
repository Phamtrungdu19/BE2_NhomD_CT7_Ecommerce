<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name, $slug, $status;

    public function rules()
    {
        return [
            'name' => 'require|string',
            'slug' => 'require|string',
            'status' => 'nullable'
        ];
    }

    public function resetInput()
    {
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
    }

    public function storebrand()
    {
        $validatedData = $this->validate();
        Brand::created([
            'name' => $this->name,
            'slug' => Str::slug($this->slug),
            'status' =>  $this->status == true ? '1' : '0',
        ]);
        session()->flash('message', 'Brand Added');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }


    public function render()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(10);

        return view('livewire.admin.brand.index', ['brands' => $brands]);
    }
}
