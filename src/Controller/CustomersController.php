<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class CustomersController extends AbstractController
{
	/**
	*	@var Environment
	*/

	// private $twig;

	// public function __construct(Environment $twig)
	// {
	// 	$this->twig = $twig;
	// }

    public function index()
    {
    	return $this->render('pages\customers.html.twig');
        //return new Response($this->twig->render('pages\customers.html.twig'));
    }
}
