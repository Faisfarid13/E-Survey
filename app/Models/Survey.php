<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Survey extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'user_id',
    //     'title',
    //     'description',
    //     'criteria',
    //     'status'
    // ];
    protected $guarded = [
        'id'
    ];
    public function section(): HasMany
    {
        return $this->hasMany(Section::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
    public function answer(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
    public function scopeFilter($query, array $filters){
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%'. $search . '%');
        });
    }
}