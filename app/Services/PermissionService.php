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

    public static function canCreateTeam()
    {
        helper('auth');
        $userId = session()->get('user_id');
        $service = service('team');
        $teams = $service->getAll($userId);

        return is_admin() || (is_user() && count($teams) == 0);
    }
}