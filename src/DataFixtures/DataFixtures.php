<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DataFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $data = [
            [
                'title' => 'Walking Dead',
                'summary' => 'Le policier Rick Grimes se réveille après un long coma...',
                'poster' => 'https://m.media-amazon.com/images/M/MV5BZmFlMTA0MmUtNWVmOC00ZmE1LWFmMDYtZTJhYjJhNGVjYTU5XkEyXkFqcGdeQXVyMTAzMDM4MjM0._V1_.jpg',
                'category' => $this->getReference('category_horreur'), 
            ],
            // Add more entries as needed
        ];
        
        foreach ($data as $programData) {
            $program = new Program();
            $program->setTitle($programData['title']);
            $program->setSummary($programData['summary']);
            $program->setPoster($programData['poster']);
            $program->setCategory($programData['category']); // Set the entire Category object
            
            $manager->persist($program);
        }
        
        $manager->flush();
    }
}
