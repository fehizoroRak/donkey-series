<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProgramController extends AbstractController
{

    #[Route('/show/{id}', name: 'app_program_show', methods: ['GET'], requirements: ['id' => '^\d+$'], options: ['expose' => true])]
    public function index(int $id): Response
    {
        return $this->render('program/index.html.twig', [
            'id' => $id,
        ]);
    }
}
