<?php

namespace App\Models\Order;

use App\Models\User;
use App\Models\Contact\Contact;
use App\Models\Contact\ContactInfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function Contact(): BelongsToMany
    {
        return $this->BelongsToMany(Contact::class);
    }
    public function ContactInfo(): BelongsToMany
    {
        return $this->BelongsToMany(ContactInfo::class);
    }

}
