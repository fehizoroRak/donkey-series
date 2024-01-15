<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $actorsData = [
            [
                'name' => 'Acteur1Fix',
            ],
            [
                'name' => 'Acteur2Fix',
            ],
            [
                'name' => 'Acteur3Fix',
            ],
            [
                'name' => 'Acteur4Fix',
            ],
            [
                'name' => 'Acteur5Fix',
            ],
        ];

        foreach ($actorsData as $actorData) {
            $actor = new Actor();
            $actor->setName($actorData['name']);
            $this->addReference('actor_' . strtolower($actorData['name']), $actor);
            $manager->persist($actor);
        }

        $manager->flush();
    }
}
