<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Roles extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'role', 'description'
    ];

    public function users() {
        return $this->hasMany(User::class, 'role_id');
    }
}
