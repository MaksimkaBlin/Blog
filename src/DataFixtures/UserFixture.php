<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixture extends BaseFixture
{
    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(User::class, 10, function(User $user) {

            $user->setEmail($this->faker->email);
            $user->setFirstName($this->faker->firstName);


        });

        $manager->flush();
    }
}
