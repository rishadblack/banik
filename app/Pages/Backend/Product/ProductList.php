<?php

namespace App\Pages\Backend\Product;

use Livewire\Attributes\On;
use App\Http\Common\Component;
use App\Models\Product\Product;
use Livewire\Attributes\Layout;

#[Layout('layouts.backend')]
class ProductList extends Component
{

    #[On('productDelete')]
    public function destroy($data)
    {
        $data = $this->alertConfirm($data, 'Are you sure to delete Product?');

        if(isset($data['id'])) {
            $Product = Product::find($data['id']);

            if(!$Product) {
                $this->alert('error', 'Product Not Found!!');
                return;
            }

            $Product->delete();

            $this->alert('success', 'Product Deleted Successfully!!');
            $this->dispatch('refreshDatatable');
        }

    }

    public function render()
    {

        return view('pages.backend.product.product-list');
    }
}
