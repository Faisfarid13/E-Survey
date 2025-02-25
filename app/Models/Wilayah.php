<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function question_category()
    {
        return $this->belongsTo(QuestionCategory::class);
    }
}
