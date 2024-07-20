<?php

namespace App\Middleware;

use Lil\Middleware;

class AuthMiddleware implements Middleware {
    public function Run() {
        // Check if user is logged in
        session_start();
        if (!isset($_SESSION['user'])) {
            // Redirect to login page if not authenticated
            return false;
        }
        return true;
    }
}
