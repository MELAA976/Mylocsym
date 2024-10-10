<?php

namespace App\Controller;

use App\Repository\ObjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ObjetController extends AbstractController
{

    #[Route('/objet', name: 'app_objet')]
    public function index(): Response
    {

        return $this->render('objet/index.html.twig', [
            'controller_name' => 'ObjetController',
        ]);
    }


    #[Route('/objet', name: 'app_objet')]
    public function allObjets(ObjetRepository $allObjets): Response
    {
        $Objets = $allObjets->findAll();
        return $this->render('objet/index.html.twig', [
            'allObjets' => $Objets
            
        ]);
    }

    #[Route('/objet/{id}', name: 'app_objetItem')]
    public function objetItem(ObjetRepository $objetItem, int $id): Response
    {
        $objetItem = $objetItem->find($id);
        dump($objetItem);
        return $this->render('objet/objetItem.html.twig',[
            'objetItem'=> $objetItem,
        ]);
    }
}
