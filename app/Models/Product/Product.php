<?php

namespace App\Models\Product;

use App\Models\User;
use App\Models\Product\Brand;
use App\Models\Order\OrderItem;
use App\Models\Product\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
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
    public function Brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function Unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
    public function OrderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class,'id');
    }

    public function scopeSearch($query, $term)
    {
        return $query->whereLike(['code','name'], $term);
    }
}
