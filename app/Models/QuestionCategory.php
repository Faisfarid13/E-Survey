<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
    public function question()
    {
        return $this->hasMany(Question::class);
    }
    public function wilayah()
    {
        return $this->hasMany(Wilayah::class);
    }
}
