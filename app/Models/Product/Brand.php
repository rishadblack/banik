<?php

namespace App\Models\Product;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
