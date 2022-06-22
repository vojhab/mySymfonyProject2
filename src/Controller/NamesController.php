<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NamesController extends AbstractController
{
    /**
    * @Route("/")
    */
    public function names(): Response
    {
        $firstName = "Jan";
        $secondName = "Novák";

        return $this->render('index.html.twig', [
            'firstName' => $firstName,
            'secondName' => $secondName,
        ]);
    }
}