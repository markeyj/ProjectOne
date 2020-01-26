<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class ParametersController
{
    public function index()
    {
        return new Response(
            'Paramètres'
        );
    }

    private function importISOCode($File) {
    	
    }
}
