<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public static function rules(){
        $roles = (new Roles())->getTable();
        return [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email',
            'role_id' => "required|exists:{$roles},id",
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public  function role() {
        return $this->belongsTo(Roles::class, 'role_id')->first();
    }

    public function getRole(){
        return $this->role()->role;
    }

    public function isEditor(){
        return $this->getRole() == 'editor';
    }

    public function isAdmin(){
        return $this->getRole() == 'admin';
    }

    public function isAuthor(){
        return $this->getRole() == 'author';
    }
}
