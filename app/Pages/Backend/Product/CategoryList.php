<?php

namespace App\Pages\Backend\Product;

use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use App\Models\Product\Category;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.backend')]
class CategoryList extends Component
{
    public $category_id;

    public $name;
    public $code;
    public $status = 1;
    public $categories;

    #[On('openCategoryModal')]
    public function openCategoryModal($data = [])
    {
        $this->categoryReset();

        if(isset($data['id'])) {
            $Category = Category::find($data['id']);

            if(!$Category) {
                $this->alert('error', 'Category Not Found!!');
                return;
            }

            $this->category_id = $Category->id;
            $this->name = $Category->name;
            $this->code = $Category->code;
            $this->status = $Category->status;
        }

        $this->dispatch('modalOpen', 'categoryModal');
    }

    public function categoryReset()
    {
        $this->reset();
        $this->resetValidation();
        $this->code = str_pad((Category::latest()->orderByDesc('id')->first()->code + 1), 3, '0', STR_PAD_LEFT);
    }

    #[On('categoryDelete')]
    public function destroy($data)
    {
        $data = $this->alertConfirm($data, 'Are you sure to delete Category?');

        if(isset($data['id'])) {
            $Category = Category::find($data['id']);

            if(!$Category) {
                $this->alert('error', 'Category Not Found!!');
                return;
            }

            $Category->delete();

            $this->alert('success', 'Category Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }
    }

    public function storeCategory($storeType = null)
    {

        $data =$this->validate([
            'name' => 'required|string',
            'code' => 'required|string',
        ]);

        $Category = Category::findOrNew($this->category_id);

        if($this->category_id) {
            $message = 'Category Updated Successfully!';
        } else {
            $message = 'Category Added Successfully!';
            $Category->user_id = Auth::id();
        }

        $Category->name = $this->name;
        $Category->code = $this->code;
        $Category->status = $this->status;
        $Category->save();

        if($storeType == 'new') {
            $this->categoryReset();
        } else {
            $this->category_id = $Category-> id;
        }

        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');

    }

    public function render()
    {
        $this->categories = Category::all();
        return view('pages.backend.product.category-list');
    }
}
