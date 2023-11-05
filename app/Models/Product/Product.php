<?php

namespace App\Models\Product;

use App\Models\User;
use App\Models\Product\Brand;
use App\Models\Product\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function Vendor(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
