<?php

namespace App\Models\Contact;

use App\Models\Contact\ContactGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactInfo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public $timestamps = true;

    public function Contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }
    public function ContactGroup(): BelongsTo
    {
        return $this->belongsTo(ContactGroup::class, 'contact_group_id');
    }
    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }

}
