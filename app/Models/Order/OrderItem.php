<?php

namespace App\Models\Order;

use App\Models\User;
use App\Models\Order\Order;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
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

    public function Order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function Product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
