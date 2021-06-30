<?php

namespace App\Services;

class PermissionService
{
    public static function hasPermissions($teamId, $userId)
    {
        $service = service('team');

        $team = $service->getById($teamId);
        return $team->user_id == $userId;
    }
}