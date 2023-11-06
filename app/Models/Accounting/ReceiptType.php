<?php

namespace App\Models\Accounting;

use App\Models\User;
use App\Models\Accounting\Receipt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Accounting\LedgerAccount;

class ReceiptType extends Model
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
}
