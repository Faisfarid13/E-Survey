<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\HasAvatar;
// use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasAvatar
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function answer()
    {
     return $this->hasMany(Answer::class);
    }

    // public function canAccessPanel(Panel $panel): bool
    // {
    //     return $this->hasRole(['Admin', 'Pegawai', 'Operator Unit']);
    // }

    public function answers()
    {
     return $this->belongsTo(Answer::class);
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->photo ? Storage::url($this->photo) : null;
    }

    protected static function boot() 
    {
        parent::boot();
        static::updating(function($model){
        if($model->isDirty('photo') && ($model->getOriginal('photo') !== null)){
        Storage::disk('public')->delete($model->getOriginal('photo')) ;
        }
        }) ;
    }
}
