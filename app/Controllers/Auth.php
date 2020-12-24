<?php namespace App\Controllers;

class Auth extends BaseController
    {
        public function register(){
            return view('auth/register');
        }
        
        public function login(){
            return view('auth/login');
        }
    }