<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class PurchasesController
{
    public function index()
    {
        return new Response(
            'Achats'
        );
    }
}
