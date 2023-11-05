<?php

namespace App\Pages\Backend\Product;

use Livewire\Attributes\Url;
use Livewire\WithFileUploads;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use App\Models\Product\Category;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.backend')]
class CategoryDetails extends Component
{
    use WithFileUploads;
    #[Url]
    public $category_id;

    public $name;
    public $code;

    public function storeCategory($storeType = null)
    {

        $this->validate([
            'name' => 'required|string',
            'code' => 'required|string',
        ]);

        $Category = Category::findOrNew($this->category_id);

        $Category->name = $this->name;
        $Category->code = $this->code;
        $Category->save();

        if($storeType == 'new'){
            $this->reset();
        }else{
            $this->category_id = $Category-> id;
        }
        if($this->category_id) {
            $message = 'Category Updated Successfully!';
        } else {
            $message = 'Category Added Successfully!';
        }

        $this->alert('success', $message);
    }

    public function mount()
    {
        if($this->category_id) {
            $Category = Category::find($this->category_id);
            $this->name = $Category->name;
            $this->code = $Category->code;
        }
    }

    public function render()
    {
        return view('pages.backend.product.category-details');
    }
}
