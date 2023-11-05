<?php

namespace App\Pages\Backend\Inventory;


use Livewire\Attributes\Url;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use App\Models\Inventory\StockTransfer;


#[Layout('layouts.backend')]
class StockMovementDetails extends Component
{
    #[Url]
    public $stocktransfer_id;
    public $stock_transfer_code;
    public $particular;
    public $reference;
    public $from_outlet;
    public $to_outlet;
    public $date;
    public $type;
    public $stock_transfer_status;
    public $note;
    public $quantity;
    public $transfer_amount;
    public $cost_price;
    public $discount;

    public function storeStockTransfer($storeType = null)
    {
    $this->validate([

        'from_outlet' => 'required|string',
        'to_outlet' => 'required|string',
        'stock_transfer_code' => 'required|string',
    ]);

    $Transfer = StockTransfer::findOrNew($this->stocktransfer_id);
    $Transfer->stock_transfer_code = $this->stock_transfer_code;
    $Transfer->particular = $this->particular;
    $Transfer->reference = $this->reference;
    $Transfer->from_outlet = $this->from_outlet;
    $Transfer->to_outlet = $this->to_outlet;
    $Transfer->note = $this->note;
    $Transfer->date = $this->date;
    $Transfer->type = $this->type;
    $Transfer->stock_transfer_status = $this->stock_transfer_status;
    $Transfer->save();

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
        $Transfer = StockTransfer::find($this->stocktransfer_id);
        $this->stock_transfer_code = $Transfer->stock_transfer_code;
        $this->particular = $Transfer->particular;
        $this->reference = $Transfer->reference;
        $this->from_outlet = $Transfer->from_outlet;
        $this->to_outlet = $Transfer->to_outlet;
        $this->note = $Transfer->note;
        $this->date = $Transfer->date;
        $this->type = $Transfer->type;
        $this->stock_transfer_status = $Transfer->stock_transfer_status;
    }
}
    public function render()
    {
        return view('pages.backend.inventory.stock-movement-details');
    }
}
