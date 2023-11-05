<?php

namespace App\Pages\Backend\Product;

use App\Models\Product\Unit;
use Livewire\Attributes\Url;
use App\Models\Product\Brand;
use Livewire\WithFileUploads;
use App\Http\Common\Component;
use App\Models\Product\Product;
use Livewire\Attributes\Layout;
use App\Models\Product\Category;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.backend')]
class ProductDetails extends Component
{
    use WithFileUploads;
    #[Url]
    public $product_id;
    public $name;
    public $code;
    public $short_description;
    public $description;
    public $categories;
    public $brand_id;
    public $is_warrantable;
    public $is_returnable;
    public $net_purchase_price;
    public $net_sale_price;
    public $profit_margin;
    public $unit_id;
    public $category_id;
    public $unit;
    public $vendor;

    public function storeProduct($storeType = null)
    {
        $this->validate([
            'name' => 'required',
            'code' => 'required|string',
            'category_id' => 'required',
            'brand_id' => 'required',
            'unit_id' => 'required',
            'net_sale_price' => 'required',
            'net_purchase_price' => 'required',
            'profit_margin' => 'required',
        ]);

        $Product = Product::findOrNew($this->product_id);

        $Product->name = $this->name;
        $Product->code = $this->code;
        $Product->description = $this->description;
        /*$Product->type = $this->type;  */
        $Product->net_purchase_price = $this->net_purchase_price;
        $Product->net_sale_price = $this->net_sale_price;
        $Product->profit_margin = $this->profit_margin;
        $Product->brand_id = $this->brand_id;
        $Product->category_id = $this->category_id;
        $Product->unit_id = $this->unit_id;


        $Product->save();

        if($storeType == 'new') {
            $this->reset();
        } else {
            $this->product_id = $Product->id;
        }

        if($this->product_id) {
            $message = 'Product Updated Successfully!';
        } else {
            $message = 'Product Added Successfully!';
        }

        $this->alert('success', $message);


    }

    public function mount()
    {
        if($this->product_id) {
            $Product = Product::find($this->product_id);
            $this->name = $Product->name;
            $this->code = $Product->code;
            $this->description = $Product->description;
            $this->net_purchase_price = $Product->net_purchase_price;
            $this->net_sale_price = $Product->net_sale_price;
            $this->profit_margin = $Product->profit_margin;
            $this->brand_id = $Product->brand_id;
            $this->category_id = $Product->category_id;
            $this->unit_id = $Product->unit_id;
        }
    }

    public function render()
    {
        $this->categories = Category::all();
        $this->unit = Unit::all();
        $this->vendor = Brand::all();
        return view('pages.backend.product.product-details');
    }
}
