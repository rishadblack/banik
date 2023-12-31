<?php

namespace App\Models\Setting;

use App\Models\User;
use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warehouse extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function Order(): BelongsTo
    {
        return $this->belongsTo(Order::class,'warehouse_id','id');
    }
    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }
}
