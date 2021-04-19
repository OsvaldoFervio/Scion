<?php

define('ADMIN', 1);

if (! function_exists('is_admin'))
{
    function is_admin(): bool
    {
        return session()->get('role_id') == ADMIN;
    }
}