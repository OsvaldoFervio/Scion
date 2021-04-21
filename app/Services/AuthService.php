<?php


namespace App\Services;


class AuthService
{
    private static $ADMIN = 1;
    private static $USER = 2;

    public function isLoggedIn(): bool {
        return session()->has('user_id');
    }

    public function isAdmin(): bool {
        return $this->isLoggedIn() and session()->get('role_id') == static::$ADMIN;
    }
}