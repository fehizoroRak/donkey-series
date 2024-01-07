<?php

namespace App\Controller;

use App\Entity\Program;
use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProgramController extends AbstractController
{

    #[Route('/', name: 'program_index')]
    public function index(ProgramRepository $programsRepository): Response
    {
        $programs = $programsRepository->findAll();
        return $this->render('program/index.html.twig', [
            'programs' => $programs,
        ]);
    }

    #[Route('/show/{id}', name: 'program_show', methods: ['GET'], requirements: ['id' => '^\d+$'], options: ['expose' => true])]
    public function show(int $id,ProgramRepository $programRepository): Response
    {
        $program = $programRepository->find($id);
    if (!$program) {
        throw $this->createNotFoundException(
            'No program with id : '.$id.' found in program\'s table.'
        );
    }

        return $this->render('program/show.html.twig', [
            'program' => $program,
        ]);
    }




}
