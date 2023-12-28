<?php

namespace App\Models\Accounting;

use App\Models\User;
use App\Models\Order\Order;
use App\Models\Contact\Contact;
use App\Models\Contact\ContactInfo;
use App\Models\Setting\PaymentMethod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    public $timestamps = true;

    protected $casts = [
        'txn_date' => 'datetime',
    ];


    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function PaymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class,'payment_method_id');
    }
    public function Contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class,'contact_id');
    }
    public function ContactInfo(): BelongsTo
    {
        return $this->belongsTo(ContactInfo::class,'payment_method_id');
    }
    public function order(): HasMany
    {
        return $this->hasMany(Order::class,'order_id');
    }
    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }
}
