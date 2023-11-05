<?php

namespace App\Models\order;

use App\Models\User;
use App\Models\Order\Purchase;
use App\Models\Contact\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseReturn extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function Supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }
    public function Purchase(): BelongsTo
    {
        return $this->belongsTo(Purchase::class);
    }
}
