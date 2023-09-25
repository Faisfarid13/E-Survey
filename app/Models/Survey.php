<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Survey extends Model
{
    use HasFactory;
<<<<<<< HEAD

    protected $guarded = ['id'];
}
=======
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
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
>>>>>>> 33e9ca32853fe29ec694914f9ffccea68e580b59
