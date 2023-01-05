<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home/{prenom}', name: 'app_home')]
    public function index($prenom): Response
    {
        return $this->render('home/index.html.twig', [
            'value' => $prenom,
        ]);
    }
}
