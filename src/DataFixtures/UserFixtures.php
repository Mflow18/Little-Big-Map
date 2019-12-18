<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $celia = new User();
        $celia->setFirstName('Celia');
        $celia->setLastName('Detereau');
        $celia->setPicture('https://www.photosdecinema.com/1607-large_default/etrange-noel-de-monsieur-jack-l-the-nightmare-before-christmas.jpg');
        $celia->setEmail('celiadetereau@gmail.com');
        $celia->setPassword('celia');

        $manager->persist($celia);

        $isaure = new User();
        $isaure->setFirstName('Isaure');
        $isaure->setLastName('Clavier');
        $isaure->setPicture('https://disney-planet.fr/wp-content/uploads/2016/12/oogie-boogie-personnage-etrange-noel-de-monsieur-jack-03.jpg');
        $isaure->setEmail('isaureclavier@gmail.com');
        $isaure->setPassword('isaure');

        $manager->persist($isaure);

        $klaus = new User();
        $klaus->setFirstName('Klaus');
        $klaus->setLastName('Heissler');
        $klaus->setPicture('https://resize-elle.ladmedia.fr/rcrop/638,,forcex/img/var/plain_site/storage/images/loisirs/cinema/dossiers/films-de-noel-notre-best-of/l-etrange-noel-de-m-jack-de-henry-selick-1994/20037504-1-fre-FR/L-etrange-Noel-de-M.-Jack-de-Henry-Selick-1994.jpg');
        $klaus->setEmail('klausHeissler@gmail.com');
        $klaus->setPassword('klaus');

        $manager->persist($klaus);

        $manager->flush();
    }
}
