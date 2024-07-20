<?php

namespace App\Model;

use Lil\Model;

class User extends Model {
    protected $table = 'users';

    // Allow mass assignment for these attributes
    protected $fillable = [
        'username',  // Username of the user
        'email',     // Email address of the user
        'password',  // Hashed password of the user
    ];

    // Define a relationship to the Blog model
    public function blogs() {
        return $this->hasMany(Blog::class, 'user_id');
    }
}
