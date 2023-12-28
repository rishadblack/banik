<?php

namespace App\Models\Setting;

use App\Models\Accounting\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function Transaction(): HasMany
    {
        return $this->hasMany(Transaction::class,'payment_method_id','id');
    }
    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }
}
