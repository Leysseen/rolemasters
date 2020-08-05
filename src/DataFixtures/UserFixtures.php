<?php

namespace App\DataFixtures;

use App\Entity\Auth;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $user = new User($manager);
        $user->setFirstname('Laurent');
        $user->setLastname('Doudiès');
        $user->setEmail('l.doudies@ld-clic.com');
        $user->setLogin('Elvan');
        $user->setPasswd(md5('Les2Tours'));

        $auth = $manager->getRepository(Auth::class)
            ->findOneBy(array("level" => "Administrateur"));
        $user->setAuth($auth);

        $manager->persist($user);

        $manager->flush();
    }
}
