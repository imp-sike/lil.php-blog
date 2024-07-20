<?php

namespace App\Model;

use Lil\Model;

class Blog extends Model {
    protected $table = 'blogs';

    // Allow mass assignment for these attributes
    protected $fillable = [
        'user_id',   // Reference to the user who created the blog post
        'title',     // Title of the blog post
        'content',   // Content of the blog post
        'image',   // Content of the blog post
    ];

    // Define a relationship to the User model
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
