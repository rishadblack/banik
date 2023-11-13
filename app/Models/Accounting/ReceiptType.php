<?php

namespace App\Models\Accounting;

use App\Models\User;
use App\Models\Accounting\Receipt;
use Illuminate\Database\Eloquent\Model;
use App\Models\Accounting\LedgerAccount;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReceiptType extends Model
{
    use HasFactory;
    use SoftDeletes;
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
    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }

}
