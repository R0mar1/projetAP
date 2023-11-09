<?php

namespace App\Filters;

use App\Controllers\Utilisateur;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class isConnected implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!Utilisateur::isConnected()){
            session() -> setFlashdata(['error' => 'Connectez vous avant d\'acceder a la dite page']);
            return redirect() -> to(base_url('/se-connecter'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}