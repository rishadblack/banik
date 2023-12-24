<?php

namespace App\Models\Order;

use App\Models\Accounting\Transaction;
use App\Models\User;
use App\Models\Setting\Outlet;
use App\Models\Contact\Contact;
use App\Models\Order\OrderItem;
use App\Models\Setting\Warehouse;
use App\Models\Contact\ContactInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public $timestamps = true;

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function OrderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function Transaction(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function Contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }

    public function ContactInfo(): BelongsTo
    {
        return $this->belongsTo(ContactInfo::class);
    }

    public function Outlet(): BelongsTo
    {
        return $this->belongsTo(Outlet::class);
    }

    public function Warehouse(): BelongsTo
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function scopeSearch($query, $term)
    {
        return $query->whereLike(['code'], $term);
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }


}
