<?php

namespace App\Pages\Backend\Inventory;


use Livewire\Attributes\Url;
use App\Http\Common\Component;
use App\Models\Product\Product;
use Livewire\Attributes\Layout;
use App\Models\Setting\Warehouse;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventory\StockReceipt;
use App\Models\Inventory\StockReceiptItem;


#[Layout('layouts.backend')]
class StockAdjustmentDetails extends Component
{
    #[Url]
    public $stockadjustment_id;

    public $search_product;
    public $code;
    public $ref;
    public $warehouse_id;
    public $quantity;
    public $damage_quantity;
    public $amount;

    public $item_rows = [];
    public $item_product_id = [];
    public $item_name = [];
    public $item_code = [];
    public $item_quantity = [];

    public function updatedSearchProduct($value)
    {
        if (empty($value)) {
            return true;
        }

        $Product = Product::find($value);

        $item_rows = collect($this->item_rows);

        if ($item_rows->contains($Product->id)) {
            $this->alert('error', 'Product Already Added!');
            return true;
        }

        $item_rows->push($Product->id);
        $this->item_rows = $item_rows;

        $this->item_product_id[$Product->id] = $Product->id;
        $this->item_name[$Product->id] = $Product->name;
        $this->item_code[$Product->id] = $Product->code;
        $this->item_quantity[$Product->id] = 1;

        $this->reset('search_product');
        $this->dispatch('search_product_reset');
    }

    public function updatedItemQuantity($value, $productId)
    {
        $this->ItemRowsUpdate($productId);
    }


    public function ItemRowsUpdate($productId)
    {

        $item_quantity = isset($this->item_quantity[$productId]) && $this->item_quantity[$productId] > 0 ? $this->item_quantity[$productId] : 1;

        $this->rowsUpdate();
    }

    public function rowsUpdate()
    {
        $item_quantity = collect($this->item_quantity)->sum();
    }

    public function removeItem($productId)
    {
        $item_rows = collect($this->item_rows);
        $item_rows = $item_rows->filter(function ($value, $key) use ($productId) {
            return $value != $productId;
        });
        $this->item_rows = $item_rows;

        unset($this->item_product_id[$productId]);
        unset($this->item_name[$productId]);
        unset($this->item_code[$productId]);
        unset($this->item_quantity[$productId]);

        $this->rowsUpdate();
    }

    public function storeStockAdjustment($storeType = null)
    {
        $this->validate([
            'code' => 'required|string',
        ]);

        $Adjustment = StockReceipt::findOrNew($this->stockadjustment_id);
        if ($this->stockadjustment_id) {
            $message = 'Stock Adjustment Updated Successfully!';
        } else {
            $message = 'Stock Adjustment Added Successfully!';
            $Adjustment->user_id = Auth::id();
        }

        $Adjustment->type = 1;
        $Adjustment->code = $this->code;
        $Adjustment->ref = $this->ref;
        $Adjustment->warehouse_id = $this->warehouse_id;
        $Adjustment->quantity = $this->damage_quantity ?? 0;
        $Adjustment->save();

        foreach ($this->item_rows as $key => $value) {
            $AdjustmentItem = $Adjustment->StockReceiptItem()->where('product_id', $this->item_product_id[$value])->firstOrNew(['stockAdjustment_id' => $Adjustment->id, 'product_id' => $this->item_product_id[$value]]);
            $AdjustmentItem->user_id =  $Adjustment->user_id;
            $AdjustmentItem->stock_receipt_id = $Adjustment->id;
            $AdjustmentItem->product_id = $value;
            $AdjustmentItem->name = $this->item_name[$value];
            $AdjustmentItem->quantity = $this->item_quantity[$value];
            $AdjustmentItem->save();
        }

        if ($storeType == 'new') {
            $this->adjustmentReset();
        } else {
            $this->stockadjustment_id = $Adjustment->id;
        }


        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');
    }
    public function adjustmentReset()
    {
        $this->reset();
        $this->resetValidation();
        $this->code = str_pad((StockReceipt::latest()->orderByDesc('id')->first()?->code + 1), 3, '0', STR_PAD_LEFT);
    }

    public function mount()
    {
        if ($this->stockadjustment_id) {
            $Adjustment = StockReceipt::find($this->stockadjustment_id);
            $this->code = $Adjustment->code;
            $this->ref = $Adjustment->ref;
            $this->warehouse_id = $Adjustment->warehouse_id;
            $this->quantity = $Adjustment->quantity ?? 0;

            $this->quantity = $Adjustment->StockReceiptItem->quantity ?? 0;
        } else {
            $this->adjustmentReset();
        }
    }

    public function render()
    {
        $warehouse = Warehouse::all();
        return view('pages.backend.inventory.stock-adjustment-details', compact('warehouse'));
    }
}
