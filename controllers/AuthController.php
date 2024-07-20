<?php

namespace App\Controller;

use Lil\Controller;
use App\Model\User;
use Lil\View;

class AuthController extends Controller {
    
    // Show the login form
    public function showLogin() {
        return view('auth/login');
    }
    
    // Handle login form submission
    public function login() {
        $data = mustHave($_POST, ['email', 'password']);
        
        if (!$data) {
            return redirect(route('auth.login', ['error' => 'Invalid Email or Password.']));
        }

        $user = (new User())->where(['email' => $data['email'], 'password' => md5($data['password'])]);

        if (count($user) > 0) {
            session_start();
            // Assuming user authentication is successful
            $_SESSION['user'] = $user[0];
            return redirect(route('home'));
        }

        return redirect(route('auth.login', ['error' => 'Invalid Email or Password.']));
    }

    // Show the signup form
    public function showSignup() {
        return view('auth/signup');
    }

    // Handle signup form submission
    public function signup() {
        $data = mustHave($_POST, ['username', 'email', 'password']);
        
        if (!$data) {
            return redirect(route('auth.signup',['error' => 'All fields are required.']));
        }

        $user = new User();
        $user->insert([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => md5($data['password'])
        ]);

        return redirect(route('auth.login', ['success' => 'Signup success please log in.']));
    }

    // Handle user logout
    public function logout() {
        unset($_SESSION['user']);
        return redirect(route('auth.login', ['success' => 'You have been logged out.']));
    }
}
