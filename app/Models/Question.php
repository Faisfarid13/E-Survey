<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'survey_id',
    //     'question'
    // ];
    protected $guarded = [
        'id'
    ];
    protected $casts = ['validation'=> 'array'];
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function choice()
    {
        return $this->hasMany(Choice::class);
    }
    public function question_category()
    {
        return $this->belongsTo(QuestionCategory::class);
    }
    public function answer()
    {
        return $this->hasMany(Answer::class);
    }

}
