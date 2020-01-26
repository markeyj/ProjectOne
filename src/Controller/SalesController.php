<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class SalesController
{
    public function index()
    {
        return new Response(
            'Ventes'
        );
    }
}
