<?php

namespace App\Models\Accounting;

use App\Models\User;
use App\Models\Setting\PaymentMethod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    public $timestamps = true;

    protected $casts = [
        'txn_date' => 'datetime',
    ];


    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function PaymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }
    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }
}
