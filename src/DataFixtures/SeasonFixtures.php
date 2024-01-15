<?php

namespace App\DataFixtures;
use App\Entity\Season;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $seasonData = [
            [
                'number' => 1,
                'year' => 2022,
                'description' => 'Saison 1',
                'program' => 
                $this->getReference('program_walking dead'), 
             
            ],
            [
                'number' => 2,
                'year' => 2023,
                'description' => 'Saison 2',
                'program' => 
                $this->getReference('program_the haunting of hill house'),
               
            ],
            [
                'number' => 3,
                'year' => 2001,
                'description' => 'Saison 3',
                'program' => 
                $this->getReference('program_love death and robots'),
                
            ],
            [
                'number' => 4,
                'year' => 2013,
                'description' => 'Saison 4',
                'program' => 
                $this->getReference('program_american horror story'),
                
            ],
            [
                'number' => 5,
                'year' => 2009,
                'description' => 'Saison 5',
                'program' => 
                $this->getReference('program_penny dreadful'),
                
            ],
            [
                'number' => 6,
                'year' => 2000,
                'description' => 'Saison 6',
                'program' => 
                $this->getReference('program_fear the walking dead'),
           

            ],
         
        ];

        foreach ($seasonData as $data) {
            $season = new Season();
            $season
                ->setNumber($data['number'])
                ->setYear($data['year'])
                ->setDescription($data['description']);
        
            // Retrieve the reference for the associated program
            $programReference = 'program_' . strtolower($data['program']->getTitle()); 
            $program = $this->getReference($programReference);
    

            // Associate the season with the program
            $season->setProgram($program);
        
            $manager->persist($season);
            // Store a reference to the season
            $this->addReference('season_' . $data['number'], $season);
        }
        
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            DataFixtures::class, 
        ];
    }
}
