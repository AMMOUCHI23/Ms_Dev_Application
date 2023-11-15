<?php

namespace App\Controller;
use App\Entity\Commande;
use App\Form\CommandeFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'commande')]
    public function index(Request $request): Response
    {   
        $form = $this->createForm(CommandeFormType::class);
       
        return $this->render('commande/index.html.twig', [
            "form"=>$form
        ]);
    }
}
