<?php

namespace App\Controller;

use App\Entity\Episode;
use App\Entity\Program;
use App\Entity\Season;
use App\Repository\ProgramRepository;
use App\Repository\SeasonRepository;
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

    // #[Route('/show/{id}', name: 'program_show', methods: ['GET'], requirements: ['id' => '^\d+$'], options: ['expose' => true])]
    // public function show(int $id,ProgramRepository $programRepository): Response
    // {
    //     $program = $programRepository->find($id);
    //     $seasons = $program->getSeasons();

    // if (!$program) {
    //     throw $this->createNotFoundException(
    //         'No program with id : '.$id.' found in program\'s table.'
    //     );
    // }

    //     return $this->render('program/show.html.twig', [
    //         'program' => $program,
    //         'seasons' => $seasons,
    //     ]);
    // }

     // PARAM CONVERTER
     // Installer ceci avant: symfony composer require sensio/framework-extra-bundle
    #[Route('/show/{id}', name: 'program_show', methods: ['GET'], requirements: ['id' => '^\d+$'], options: ['expose' => true])]
    public function show(Program $program, Season $seasons): Response
    {
       
        $seasons = $program->getSeasons();

    if (!$program) {
        throw $this->createNotFoundException(
            'No program with id : {id} found in program\'s table.'
        );
    }

        return $this->render('program/show.html.twig', [
            'program' => $program,
            'seasons' => $seasons,
        ]);
    }



    // #[Route('/program/{programId}/seasons/{seasonId}', name: 'program_season_show')]
    // public function showSeason(int $programId, int $seasonId, ProgramRepository $programRepository, SeasonRepository $seasonRepository)
    // {
    //     $program = $programRepository->find($programId);
    //     $season = $seasonRepository->find($seasonId);
    //     $episodes = $season->getEpisodes();

    //     return $this->render('program/season_show.html.twig', [
    //         'program' => $program,
    //         'season' => $season,
    //         'episodes' => $episodes,
    //     ]);
    // }


    // PARAM CONVERTER
    // Installer ceci avant: symfony composer require sensio/framework-extra-bundle
    #[Route('/program/{program}/seasons/{season}', name: 'program_season_show')]
    public function showSeason(Program $program, Season $season, Episode $episodes)
    {
    
        $episodes = $season->getEpisodes();

        return $this->render('program/season_show.html.twig', [
            'program' => $program,
            'season' => $season,
            'episodes' => $episodes,
        ]);
    }


    #[Route('/program/{program}/season/{season}/episodes/{episodes}', name: 'program_episode_show')]
    public function showEpisode(Program $program, Season $season, Episode $episodes)
    {
    
        return $this->render('program/episode_show.html.twig', [
            'program' => $program,
            'season' => $season,
            'episodes' => $episodes,
        ]);
    }




}
