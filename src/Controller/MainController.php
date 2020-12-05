<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProfilType;
use App\Entity\User;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(): Response
    {
        $form = $this->createForm(ProfilType::class, $this->getUser());
        return $this->render('main/index.html.twig', [
            'profil' => $form->createView(),
        ]);
    }
}
