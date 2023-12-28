<?php

namespace App\Pages\Backend\Inventory;


use Livewire\Attributes\Url;
use App\Http\Common\Component;
use App\Models\Order\OrderItem;
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

    public $product_id;
    public $code;
    public $ref;
    public $warehouse_id;
    public $quantity;
    public $damage_quantity;
    public $outlet_id;
    public $stock_receipt_date;


    //Stock item
    public $item_rows = [];
    public $item_deleted_rows = [];
    public $item_product_id = [];
    public $item_name = [];
    public $item_code = [];
    public $item_quantity = [];
    public $item_current_stock = [];

    //Stock item
    public $current_item_rows = [];

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
        // $this->item_current_stock[$Product->id] = $Product->OrderItem['0']->quantity;
        $this->item_current_stock[$Product->id] = 5;



        $this->reset('search_product');
        $this->dispatch('search_product_reset');
    }

    public function updatedItemQuantity($value, $productId)
    {
        $this->ItemRowsUpdate($productId);
    }
    public function updatedItemCurrentStock($value, $productId)
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
        $this->item_deleted_rows[] = $productId;
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
        $Adjustment->outlet_id = $this->outlet_id;
        $Adjustment->stock_receipt_date  = $this->stock_receipt_date;
        $Adjustment->quantity = $this->damage_quantity ?? 0;
        $Adjustment->save();

        if (count($this->item_deleted_rows) > 0) {
            StockReceiptItem::where('stock_receipt_id', $Adjustment->id)->whereIn('product_id', $this->item_deleted_rows)->delete();
        }

        foreach ($this->item_rows as $key => $item) {
            $AdjustmentItem = $Adjustment->StockReceiptItem()->where('product_id', $this->item_product_id[$item])->firstOrNew(['stock_receipt_id' => $Adjustment->id, 'product_id' => $this->item_product_id[$item]]);
            $AdjustmentItem->user_id = $Adjustment->user_id;
            $AdjustmentItem->stock_receipt_id = $Adjustment->id;
            $AdjustmentItem->product_id = $item;
            $AdjustmentItem->name = $this->item_name[$item];
            $AdjustmentItem->quantity = $this->item_quantity[$item];
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
        $lastStock = StockReceipt::latest()->orderByDesc('id')->first();

        if ($lastStock) {
            $lastCode = $lastStock->code;
            $newCodeNumber = intval($lastCode) + 1;
            $this->code = str_pad($newCodeNumber, strlen($lastCode), '0', STR_PAD_LEFT);
        } else {
            $this->code = '001';
        }

        if ($this->stockadjustment_id) {
            $Adjustment = StockReceipt::find($this->stockadjustment_id);
            if ($Adjustment) {
                $this->code = $Adjustment->code;
                $this->ref = $Adjustment->ref;
                $this->warehouse_id = $Adjustment->warehouse_id;
                $this->outlet_id = $Adjustment->outlet_id;
                $this->stock_receipt_date = $Adjustment->stock_receipt_date;


                foreach ($Adjustment->StockReceiptItem as $key => $StockReceiptItem) {
                    $item_rows = collect($this->item_rows);
                    $item_rows->push($StockReceiptItem->product_id);
                    $this->item_rows = $item_rows;
                    $this->item_product_id[$StockReceiptItem->product_id] = $StockReceiptItem->product_id;
                    $this->item_name[$StockReceiptItem->product_id] = $StockReceiptItem->name;
                    $this->item_code[$StockReceiptItem->product_id] = $StockReceiptItem->product_code;
                    $this->item_quantity[$StockReceiptItem->product_id] = $StockReceiptItem->quantity;
                }
            }
        }
    }

    public function render()
    {
        return view('pages.backend.inventory.stock-adjustment-details');
    }
}
