<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $data = [
            [
                'name' => 'Horreur',
            ],
            [
                'name' => 'Fiction',
            ],
            [
                'name' => 'Action',
            ],
            [
                'name' => 'Comédie',
            ],
            [
                'name' => 'Drame',
            ],
            [
                'name' => 'Aventure',
            ],
            [
                'name' => 'Animation',
            ],
            [
                'name' => 'Fantastique',
            ]
          
        ];
        
        foreach ($data as $programData) {
            $category = new Category();
            $category->setName($programData['name']);
            $this->addReference('category_' . strtolower($programData['name']), $category);
            $manager->persist($category);
            
        }
        
        $manager->flush();
    }
}
