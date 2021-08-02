<?php

define('ADMIN', 1);
define('USERS', 2);

if (! function_exists('is_admin'))
{
    function is_admin(): bool
    {
        return session()->get('role_id') == ADMIN;
    }
}

if (!function_exists('is_user'))
{
    function is_user(): bool
    {
        return session()->get('role_id') == USERS;
    }
}