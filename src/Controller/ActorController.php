<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Entity\Program;
use App\Repository\ActorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActorController extends AbstractController
{
    #[Route('/actor/{id}', name: 'actor_show')]
    public function show(Actor $actors): Response
    {
        return $this->render('actor/show.html.twig', [
            'actors' => $actors,
        ]);
    }

    
}
