<?php
use App\Controller\BlogController;
use App\Middleware\AuthMiddleware;
use Lil\Routes;

use App\Controller\AuthController;

// Authentication
Routes::get('/login', [AuthController::class, 'showLogin'], 'auth.login');
Routes::post('/login', [AuthController::class, 'login'], 'auth.login.process');
Routes::get('/signup', [AuthController::class, 'showSignup'], 'auth.signup');
Routes::post('/signup', [AuthController::class, 'signup'], 'auth.signup.process');
Routes::get('/logout', [AuthController::class, 'logout'], 'auth.logout');


Routes::get('/dashboard', function () {
    return view('auth/dashboard');
}, 'home', [AuthMiddleware::class]);

// Blog Management

Routes::get('/admin/blog', [BlogController::class, 'index'], 'admin.blog.index', [AuthMiddleware::class]);
Routes::get('/admin/blog/create', [BlogController::class, 'create'], 'admin.blog.create', [AuthMiddleware::class]);
Routes::post('/admin/blog', [BlogController::class, 'store'], 'admin.blog.store', [AuthMiddleware::class]);
Routes::get('/admin/blog/edit/{id}', [BlogController::class, 'edit'], 'admin.blog.edit', [AuthMiddleware::class]);
Routes::post('/admin/blog/update/{id}', [BlogController::class, 'update'], 'admin.blog.update', [AuthMiddleware::class]);
Routes::post('/admin/blog/delete/{id}', [BlogController::class, 'destroy'], 'admin.blog.destroy', [AuthMiddleware::class]);


// Frontend