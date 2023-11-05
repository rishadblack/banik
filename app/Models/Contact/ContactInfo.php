<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactInfo extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function Contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

}
