<?php

namespace App\Pages\Backend\Inventory;


use Livewire\Attributes\Url;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use App\Models\Inventory\StockAdjustment;
use App\Models\Inventory\StockAdjustments;


#[Layout('layouts.backend')]
class StockAdjustmentDetails extends Component
{
    #[Url]
    public $stockadjustment_id;
    public $stock_adjustment_code;
    public $particular;
    public $reference;
    public $outlet;
    public $date;
    public $type;
    public $stock_adjustment_status;
    public $note;
    public $quantity;
    public $adjustment_amount;
    public $cost_price;
    public $discount;

    public function storeStockAdjustment($storeType = null)
    {
    $this->validate([
        'type' => 'required|string',
        'outlet' => 'required|string',
        'stock_adjustment_code' => 'required|string',
    ]);

    $Adjustment = StockAdjustment::findOrNew($this->stockadjustment_id);
    $Adjustment->stock_adjustment_code = $this->stock_adjustment_code;
    $Adjustment->particular = $this->particular;
    $Adjustment->reference = $this->reference;
    $Adjustment->outlet = $this->outlet;
    $Adjustment->note = $this->note;
    $Adjustment->date = $this->date;
    $Adjustment->type = $this->type;
    $Adjustment->stock_adjustment_status = $this->stock_adjustment_status;
    $Adjustment->save();

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
        $Adjustment = StockAdjustment::find($this->stockadjustment_id);
        $this->stock_adjustment_code = $Adjustment->stock_adjustment_code;
        $this->particular = $Adjustment->particular;
        $this->reference = $Adjustment->reference;
        $this->outlet = $Adjustment->outlet;
        $this->note = $Adjustment->note;
        $this->date = $Adjustment->date;
        $this->type = $Adjustment->type;
        $this->stock_adjustment_status = $Adjustment->stock_adjustment_status;
    }
}

    public function render()
    {
        return view('pages.backend.inventory.stock-adjustment-details');
    }
}
