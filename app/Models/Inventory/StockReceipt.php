<?php

namespace App\Models\Inventory;

use App\Models\User;
use App\Models\Setting\Outlet;
use App\Models\Setting\Warehouse;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventory\StockReceiptItem;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StockReceipt extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public $timestamps = true;

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }
    public function StockReceiptItem(): HasOne
    {
        return $this->hasOne(StockReceiptItem::class);
    }
    public function Outlet(): BelongsTo
    {
        return $this->belongsTo(Outlet::class);
    }
    public function Warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }
}
