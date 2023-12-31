<?php

namespace App\Models\Inventory;

use App\Models\User;
use App\Models\Inventory\StockReceipt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StockReceiptItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public $timestamps = true;

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function StockReceipt(): BelongsTo
    {
        return $this->belongsTo(StockReceipt::class);
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }
}
