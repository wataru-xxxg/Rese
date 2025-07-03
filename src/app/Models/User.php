<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
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
    ];

    /**
     * ユーザーのロールを取得
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * 指定されたロールを持っているかチェック
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->role->name === $role;
        }
        return $this->role_id === $role->id;
    }

    /**
     * 指定されたロールのいずれかを持っているかチェック
     */
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            return in_array($this->role->name, $roles);
        }
        return $this->hasRole($roles);
    }

    /**
     * 管理者かどうかチェック
     */
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    /**
     * 店舗オーナーかどうかチェック
     */
    public function isOwner()
    {
        return $this->hasRole('owner');
    }

    /**
     * 一般ユーザーかどうかチェック
     */
    public function isUser()
    {
        return $this->hasRole('user');
    }
}
