<?php

namespace App\Pages\Backend\Inventory;


use Livewire\Attributes\Url;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventory\StockReceipt;
use App\Models\Inventory\StockTransfer;
use App\Models\Inventory\StockReceiptItem;


#[Layout('layouts.backend')]
class StockMovementDetails extends Component
{
    #[Url]
    public $stocktransfer_id;
    public $code;
    public $warehouse_id;
    public $to_warehouse_id;
    public $ref;
    public $quantity;

    public function storeStockTransfer($storeType = null)
    {
    $this->validate([

        'code' => 'required|string',
    ]);

    $Transfer = StockReceipt::findOrNew($this->stocktransfer_id);
    $Transfer->user_id = Auth::id();
    $Transfer->code = $this->code;
    $Transfer->warehouse_id = $this->warehouse_id;
    $Transfer->to_warehouse_id = $this->to_warehouse_id;
    $Transfer->ref = $this->ref;
    $Transfer->save();

    // $TransferItem = StockReceiptItem::findOrNew($this->stocktransfer_id);
    // $TransferItem->user_id = Auth::id();
    // $TransferItem->stock_receipt_id = $Transfer->id;
    // $TransferItem->quantity = $this->quantity;
    // $TransferItem->save();


    if($storeType == 'new'){
        $this->reset();
    }else{
        $this->stocktransfer_id = $Transfer-> id;
    }
    if($this->stocktransfer_id) {
        $message = 'Stock Transfer Updated Successfully!';
    } else {
        $message = 'Stock Transfer Added Successfully!';
    }

    $this->alert('success', $message);
}

public function mount()
{
    if($this->stocktransfer_id) {
        $Transfer = StockReceipt::find($this->stocktransfer_id);
        $this->code = $Transfer->code;
        $this->warehouse_id = $Transfer->warehouse_id;
        $this->to_warehouse_id = $Transfer->to_warehouse_id;
        $this->ref = $Transfer->ref;

        // $Transfer = StockReceiptItem::find($this->stocktransfer_id);
        // $this->quantity = $Transfer->quantity;
    }
}
    public function render()
    {
        return view('pages.backend.inventory.stock-movement-details');
    }
}
