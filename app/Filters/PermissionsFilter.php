<?php

namespace App\Filters;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class PermissionsFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $service = service('permissions');
        $uri = $request->uri;
        $teamId = null;
        if($uri->getTotalSegments() == 2)
            $teamId = $uri->getSegment(2);
        else
            $teamId = $uri->getSegment(3);
        $currentUserId = session()->get('user_id');
        if(is_numeric($teamId)) {
            if(! $service::hasPermissions($teamId, $currentUserId)){
                throw new PageNotFoundException();
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}