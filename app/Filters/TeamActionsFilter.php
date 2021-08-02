<?php

namespace App\Filters;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class TeamActionsFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $service = service('permissions');
        if(! $service::canCreateTeam()) {
            throw new PageNotFoundException();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}