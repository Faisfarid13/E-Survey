<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'user_id',
        'name',
        'desc',
        'location',
        'slug',
        'date_start',
        'date_end',
        'other',
        'criteria',
    ];
    protected $dates = [
        'date_start',
        'date_end'
    ];
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    protected $casts = [
        'date_start' => 'datetime:d-m-Y',
        'date_end' => 'datetime:d-m-Y',
    ];
    public function eventResponse(): HasMany
    {
        return $this->hasMany(EventResponse::class);
    }
}
