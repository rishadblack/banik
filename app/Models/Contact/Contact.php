<?php

namespace App\Models\Contact;

use App\Models\User;
use App\Models\Contact\ContactGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    public $timestamps = true;

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function ContactInfo(): HasOne
    {
        return $this->hasOne(ContactInfo::class);
    }
    public function ContactGroup(): BelongsTo
    {
        return $this->belongsTo(ContactGroup::class, 'contact_group_id');
    }
    public function scopeSearch($query, $term)
    {
        return $query->whereLike(['code','company_name'], $term);
    }
    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }
}
