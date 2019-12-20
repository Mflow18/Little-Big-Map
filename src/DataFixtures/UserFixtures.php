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
        $celia->setPassword($this->passwordEncoder->encodePassword(
            $celia,
            'celia'
        ));
        $celia->addCategory($this->getReference('category_01'));
        $celia->addCategory($this->getReference('category_02'));
        $celia->addCategory($this->getReference('category_03'));
        $celia->addCategory($this->getReference('category_04'));
        $celia->addAddress($this->getReference('userAddress_01'));
        $celia->addAddress($this->getReference('userAddress_02'));
        $celia->addAddress($this->getReference('userAddress_03'));
        $celia->addAddress($this->getReference('userAddress_04'));
        $celia->addIris($this->getReference('iris_01'));
        $celia->addProfession($this->getReference('profession_03'));
        $celia->setAge($this->getReference('age_07'));
        $celia->setChildren($this->getReference('children_02'));
        $celia->setFamily($this->getReference('family_04'));
        $manager->persist($celia);
        $this->addReference('user_01', $celia);

        $isaure = new User();
        $isaure->setFirstName('Isaure');
        $isaure->setLastName('Clavier');
        $isaure->setPicture('https://disney-planet.fr/wp-content/uploads/2016/12/oogie-boogie-personnage-etrange-noel-de-monsieur-jack-03.jpg');
        $isaure->setEmail('isaureclavier@gmail.com');
        $isaure->setPassword($this->passwordEncoder->encodePassword(
            $isaure,
            'isaure'
        ));
        $isaure->addCategory($this->getReference('category_01'));
        $isaure->addCategory($this->getReference('category_02'));
        $isaure->addCategory($this->getReference('category_03'));
        $isaure->addCategory($this->getReference('category_04'));
        $isaure->addIris($this->getReference('iris_02'));
        $isaure->addProfession($this->getReference('profession_05'));
        $isaure->setAge($this->getReference('age_05'));
        $isaure->setChildren($this->getReference('children_01'));
        $isaure->setFamily($this->getReference('family_01'));
        $manager->persist($isaure);

        $klaus = new User();
        $klaus->setFirstName('Klaus');
        $klaus->setLastName('Heissler');
        $klaus->setPicture('https://resize-elle.ladmedia.fr/rcrop/638,,forcex/img/var/plain_site/storage/images/loisirs/cinema/dossiers/films-de-noel-notre-best-of/l-etrange-noel-de-m-jack-de-henry-selick-1994/20037504-1-fre-FR/L-etrange-Noel-de-M.-Jack-de-Henry-Selick-1994.jpg');
        $klaus->setEmail('klausHeissler@gmail.com');
        $klaus->setPassword($this->passwordEncoder->encodePassword(
            $klaus,
            'klaus'
        ));
        $klaus->addCategory($this->getReference('category_01'));
        $klaus->addCategory($this->getReference('category_02'));
        $klaus->addCategory($this->getReference('category_03'));
        $klaus->addCategory($this->getReference('category_04'));
        $klaus->addIris($this->getReference('iris_03'));
        $klaus->addProfession($this->getReference('profession_05'));
        $klaus->setAge($this->getReference('age_12'));
        $klaus->setChildren($this->getReference('children_02'));
        $klaus->setFamily($this->getReference('family_02'));
        $manager->persist($klaus);

        $manager->flush();
    }
}
