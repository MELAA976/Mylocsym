<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\ObjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    #[IsGranted('ROLE_ADMIN')]

    public function index(): Response
    {   
        $user = $this->getUser();
        
        //dd($user);

        return $this->render('profile/index.html.twig', [
            'user' => $user,
        ]);
    }
}
