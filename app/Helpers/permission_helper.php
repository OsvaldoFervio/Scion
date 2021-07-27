<?php

if (! function_exists('can_create_team'))
{
    function can_create_team(): bool
    {
        $service = service('permissions');
        return $service::canCreateTeam();
    }
}

if (! function_exists('can_update_team'))
{
    function can_update_team($teamId): bool
    {
        $service = service('permissions');
        $userId = session()->get('user_id');
        return $service::hasPermissions($teamId, $userId);
    }
}
