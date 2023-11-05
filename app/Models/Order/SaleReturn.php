<?php

namespace App\Models\order;

use App\Models\User;
use App\Models\Order\Sale;
use App\Models\Contact\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SaleReturn extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function Customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
    public function Sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }
}
