<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class SuppliersController
{
    public function index()
    {
        return new Response(
            'Fournisseurs'
        );
    }
}
