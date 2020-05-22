<?php

namespace App\DataFixtures;

use App\Entity\PostoColeta;
use App\Entity\UserLab;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserlabFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $manager->flush();
    }
}
