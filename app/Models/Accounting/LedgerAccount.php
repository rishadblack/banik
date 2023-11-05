<?php

namespace App\Models\Accounting;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LedgerAccount extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
