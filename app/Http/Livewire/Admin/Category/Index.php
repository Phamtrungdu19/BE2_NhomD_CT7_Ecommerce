<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;
use Psy\Readline\Hoa\Console;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_id;

    public function deleteCategory($category_id)
    {
        dd($category_id);
        $this->category_id = $category_id;
    }

    public function destroyCategory()
    {
        $category =  Category::find($this->category_id);
        $path = 'uploads/category/' . $category->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $category->delete();
    }
    public function render()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);

        return view('livewire.admin.category.index', ['categories' => $categories]);
    }
}
