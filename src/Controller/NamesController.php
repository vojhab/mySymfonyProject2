<?php
namespace App\Controller;

use App\Entity\NamesEntity;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;

class NamesController extends AbstractController
{
    /**
    * @Route("/")
    */
    public function names(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $newName = new NamesEntity();
        $newName->setFirstName("Michal");
        $newName->setSecondName("Svoboda");

        $entityManager->persist($newName);

        $entityManager->flush();

        return new Response('Saved new name '.$newName->getFirstName());
    }
}