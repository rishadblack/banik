<?php

namespace App\Models\Accounting;

use App\Models\User;
use App\Models\Setting\PaymentMethod;
use App\Models\Accounting\ReceiptType;
use Illuminate\Database\Eloquent\Model;
use App\Models\Accounting\LedgerAccount;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receipt extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function LedgerAccount(): BelongsTo
    {
        return $this->belongsTo(LedgerAccount::class);
    }
    public function PaymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
