<?php

namespace App\Pages\Backend\Inventory;


use Livewire\Attributes\Url;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventory\StockReceipt;
use App\Models\Inventory\StockReceiptItem;


#[Layout('layouts.backend')]
class StockAdjustmentDetails extends Component
{
    #[Url]
    public $stockadjustment_id;
    public $code;
    public $ref;
    public $warehouse_id;
    public $quantity;

    public function storeStockAdjustment($storeType = null)
    {
    $this->validate([
        'code' => 'required|string',
    ]);

    $Adjustment = StockReceipt::findOrNew($this->stockadjustment_id);
    $Adjustment->user_id = Auth::id();
    $Adjustment->type = 1;
    $Adjustment->code = $this->code;
    $Adjustment->ref = $this->ref;
    $Adjustment->warehouse_id = $this->warehouse_id;
    $Adjustment->quantity = $this->quantity;
    $Adjustment->save();

    $AdjustmentItem = StockReceiptItem::findOrNew($this->stockadjustment_id);
    $AdjustmentItem->user_id = Auth::id();
    $AdjustmentItem->stock_receipt_id = $Adjustment->id;
    $AdjustmentItem->quantity = $this->quantity;
    $AdjustmentItem->save();

    if($storeType == 'new'){
        $this->reset();
    }else{
        $this->stockadjustment_id = $Adjustment-> id;
    }
    if($this->stockadjustment_id) {
        $message = 'Stock Adjustment Updated Successfully!';
    } else {
        $message = 'Stock Adjustment Added Successfully!';
    }

    $this->alert('success', $message);
}

public function mount()
{
    if($this->stockadjustment_id) {
        $Adjustment = StockReceipt::find($this->stockadjustment_id);
        $this->code = $Adjustment->code;
        $this->ref = $Adjustment->ref;
        $this->warehouse_id = $Adjustment->warehouse_id;
        $this->quantity = $Adjustment->quantity;

        $AdjustmentItem = StockReceiptItem::find($this->stockadjustment_id);
        $this->quantity = $AdjustmentItem->quantity;
    }
}

    public function render()
    {
        return view('pages.backend.inventory.stock-adjustment-details');
    }
}
