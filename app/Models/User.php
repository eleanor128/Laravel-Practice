<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;


    const ROLE_ADMIN = 0;
    const ROLE = [
        'admin' => '0',
        'author' => '1',
        'reader' => '2',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /** 搜尋的時候用 */
    public function scopeAdmin($query)
    {
        return $query->where('role', User::ROLE['admin']);
        /** User可改成self,因為已經在User裡了 */
    }
    public function scopeTeacher($query)
    {
        return $query->where('role', User::ROLE['author']);
    }
    public function scopeStudent($query)
    {
        return $query->where('role', User::ROLE['reader']);
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class, 'author_id');
    }

    // public function courses(): HasMany
    // {
    //     return $this->hasMany(Course::class, 'lecturer_id');
    //     /** 因為之前寫過course 叫做lecture_id*/
    // }

    // public function enrolled_courses(): BelongsToMany
    // {
    //     return $this->belongsToMany(Course::class, 'enrollment')
    //         ->using(Enrollment::class)
    //         ->withTimestamps();
    // }
}
