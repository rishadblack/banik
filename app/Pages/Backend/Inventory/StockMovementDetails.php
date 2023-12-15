<?php

namespace App\Pages\Backend\Inventory;


use Livewire\Attributes\Url;
use App\Http\Common\Component;
use App\Models\Product\Product;
use Livewire\Attributes\Layout;
use App\Models\Setting\Warehouse;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventory\StockReceipt;
use App\Models\Inventory\StockTransfer;
use App\Models\Inventory\StockReceiptItem;


#[Layout('layouts.backend')]
class StockMovementDetails extends Component
{
    #[Url]
    public $stocktransfer_id;

    public $search_product;

    public $code;
    public $warehouse_id;
    public $to_warehouse_id;
    public $ref;
    public $quantity;

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

    public function storeStockTransfer($storeType = null)
    {
        $this->validate([

            'code' => 'required|string',
        ]);

        $Transfer = StockReceipt::findOrNew($this->stocktransfer_id);
        if ($this->stocktransfer_id) {
            $message = 'Stock Transfer Updated Successfully!';
        } else {
            $message = 'Stock Transfer Added Successfully!';
            $Transfer->user_id = Auth::id();
        }

        $Transfer->code = $this->code;
        $Transfer->warehouse_id = $this->warehouse_id;
        $Transfer->type = 2;
        $Transfer->to_warehouse_id = $this->to_warehouse_id;
        $Transfer->ref = $this->ref;
        $Transfer->save();

        foreach ($this->item_rows as $key => $value) {
            $TransferItem = $Transfer->StockReceiptItem()->where('product_id', $this->item_product_id[$value])->firstOrNew(['stockTransfer_id' => $Transfer->id, 'product_id' => $this->item_product_id[$value]]);
            $TransferItem->user_id =  $Transfer->user_id;
            $TransferItem->stock_receipt_id = $Transfer->id;
            $TransferItem->product_id = $value;
            $TransferItem->name = $this->item_name[$value];
            $TransferItem->quantity = $this->item_quantity[$value];
            $TransferItem->save();
        }


        if ($storeType == 'new') {
            $this->transferReset();
        } else {
            $this->stocktransfer_id = $Transfer->id;
        }


        $this->alert('success', $message);
        $this->dispatch('refreshDatatable');
    }
    public function transferReset()
    {
        $this->reset();
        $this->resetValidation();
        $this->code = str_pad((StockReceipt::latest()->orderByDesc('id')->first()?->code + 1), 3, '0', STR_PAD_LEFT);
    }

    public function mount()
    {
        if ($this->stocktransfer_id) {
            $Transfer = StockReceipt::find($this->stocktransfer_id);
            $this->code = $Transfer->code;
            $this->warehouse_id = $Transfer->warehouse_id;
            $this->to_warehouse_id = $Transfer->to_warehouse_id;
            $this->ref = $Transfer->ref;

            $this->quantity = $Transfer->StockReceiptItem->quantity;
        } else {
            $this->transferReset();
        }
    }
    public function render()
    {
        $warehouse = Warehouse::all();
        return view('pages.backend.inventory.stock-movement-details',compact('warehouse'));
    }
}
