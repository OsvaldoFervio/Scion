<?php

if (! function_exists('hash_password'))
{
    function hash_password(string $value)
    {
        return password_hash($value, PASSWORD_DEFAULT);
    }
}

if (! function_exists('check_password'))
{
    function check_password(string $value, string $hash)
    {
        return password_verify($value, $hash);
    }
}