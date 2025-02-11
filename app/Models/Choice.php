<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function questions()
    {
     return $this->belongsTo(Question::class);
    }

    public function answer()
    {
     return $this->hasMany(Answer::class);
    }

    
}
