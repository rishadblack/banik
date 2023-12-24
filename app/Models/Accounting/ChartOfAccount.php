<?php

namespace App\Models\Accounting;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChartOfAccount extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    public $timestamps = true;
    protected $casts = [
        'is_admin' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }


    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
