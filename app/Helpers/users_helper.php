<?php

define('USERS', 2);

if (!function_exists('is_user'))
{
    function is_user(): bool
    {
        return session()->get('role_id') == USERS;
    }
}