<?php

namespace App\Pages\Backend\Product;

use Livewire\Attributes\On;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use App\Models\Product\Category;


#[Layout('layouts.backend')]
class CategoryList extends Component
{
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

    public function render()
    {
        $this->categories = Category::all();
        return view('pages.backend.product.category-list');
    }
}
