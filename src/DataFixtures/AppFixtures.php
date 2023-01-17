<?php

namespace App\DataFixtures;

use App\Factory\PostFactory;
use App\Factory\CategoryFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        CategoryFactory::new()->createMany(5);
        PostFactory::new()->createMany(10);

  // Enregistrement dans la base de données
  $manager->flush();
    }
}
