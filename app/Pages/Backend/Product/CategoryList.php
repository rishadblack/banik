<?php

namespace App\Pages\Backend\Product;

use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use App\Models\Product\Category;


#[Layout('layouts.backend')]
class CategoryList extends Component
{

    #[Url]
    public $category_id;

    public $name;
    public $code;
    public $status;
    public $categories;
    #[On('categoryDelete')]
    public function destroy($data)
    {
        // $data = $this->alertConfirm($data, 'Are you sure to delete Category?');

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

        $this->validate([
            'name' => 'required|string',
            'code' => 'required|string',
        ]);

        $Category = Category::findOrNew($this->category_id);

        $Category->name = $this->name;
        $Category->code = $this->code;
        $Category->status = $this->status;
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
        $this->categories = Category::all();
        return view('pages.backend.product.category-list');
    }
}
