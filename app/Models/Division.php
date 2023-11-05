<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Division extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = true;

    public function Parent(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
