<?php

if (! function_exists('can_create_team'))
{
    function can_create_team(): bool
    {
        $service = service('permissions');
        return $service::canCreateTeam();
    }
}
