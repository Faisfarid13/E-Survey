<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventResponse extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'org_experience'=> 'array',
        'social_media'=> 'array'
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
