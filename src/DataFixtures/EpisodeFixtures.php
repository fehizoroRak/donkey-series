<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $episodeData = [
            [
                'season' => $this->getReference('season_1'),
                'title' => 'L\'appel de la mer 1',
                'number' => 2,
                'synopsis' => 'Le capitaine Nemo et son équipage explorent les prof
                ions du fond des mers.',
             
            ],
            [
             
                'season' => $this->getReference('season_2'),
                'title' => 'L\'appel de la mer 2',
                'number' => 6,
                'synopsis' => 'Le capitaine Nemo et son équipage explorent les prof
                ions du fond des mers.',
            ],
            [
             
                'season' => $this->getReference('season_3'),
                'title' => 'L\'appel de la mer 3',
                'number' => 7,
                'synopsis' => 'Le capitaine Nemo et son équipage explorent les prof
                ions du fond des mers.',
            ],
            [
                'season' => $this->getReference('season_4'),
                'title' => 'L\'appel de la mer 4',
                'number' => 5,
                'synopsis' => 'Le capitaine Nemo et son équipage explorent les prof
                ions du fond des mers.',
            ],
            [
             
                'season' => $this->getReference('season_5'),
                'title' => 'L\'appel de la mer 5',
                'number' => 11,
                'synopsis' => 'Le capitaine Nemo et son équipage explorent les prof
                ions du fond des mers.',
            ],
            [
                'season' => $this->getReference('season_6'), 
                'title' => 'L\'appel de la mer 6',
                'number' => 22,
                'synopsis' => 'Le capitaine Nemo et son équipage explorent les prof
                ions du fond des mers.',
            ],
         
        ];
        foreach ($episodeData as $data) {
            $episode = new Episode();
            $episode
                ->setTitle($data['title'])
                ->setNumber($data['number'])
                ->setSynopsis($data['synopsis'])
                ->setSeason($data['season']);
    
   

        $manager->persist($episode);
        
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            SeasonFixtures::class, 
        ];
    }


}
