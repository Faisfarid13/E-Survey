<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Answer extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function choice()
    {
     return $this->belongsTo(choice::class);
    }
    public function user()
    {
     return $this->belongsTo(user::class);
    }

    public function question()
    {
     return $this->belongsTo(Question::class);
    }

    public function survey()
    {
     return $this->belongsTo(Survey::class);
    }
}
