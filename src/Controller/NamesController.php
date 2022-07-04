<?php
namespace App\Controller;

use App\Entity\Name;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class NamesController extends AbstractController
{
    /**
     * @Route("/show")
     */
    public function show(ManagerRegistry $doctrine): Response
    {
        $names = $doctrine
            ->getRepository(Name::class)
            ->findAll();
        
        return $this->render("show.html.twig", [
            "names" => $names,
        ]);
    }

    /**
     * @Route("/save")
     */
    public function save(ManagerRegistry $doctrine, Request $request): Response
    {
        $entityManager = $doctrine->getManager();

        $name = new Name();

        $form = $this->createFormBuilder($name)
            ->add("firstName", TextType::class)
            ->add("secondName", TextType::class)
            ->add("save", SubmitType::class, ["label" => "Save"])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $name = $form->getData();

            $entityManager->persist($name);
            $entityManager->flush();

            return $this->redirect("/show");
        }

        return $this->renderForm("save.html.twig", [
            "form" => $form,
        ]);
    }

    /**
     * @Route("/delete/{id}")
     */
    public function delete(ManagerRegistry $doctrine, int $id)
    {
        $entityManager = $doctrine->getManager();

        $repository = $doctrine->getRepository(Name::class);
        $name = $repository->find($id);

        $entityManager->remove($name);
        $entityManager->flush();

        return $this->redirect("/show");
    }
}