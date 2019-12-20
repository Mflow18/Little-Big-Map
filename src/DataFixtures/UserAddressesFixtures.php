<?php

namespace App\DataFixtures;

use App\Entity\UserAddresses;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class UserAddressesFixtures extends Fixture
{
    const ADDRESSES = [
        '01' => [
            'category' => 'Sortie',
            'latitude' => '47.210209',
            'longitude' => '-1.549106',
            'name' => 'Orchidée noire',
        ],
        '02' => [
            'category' => 'Sport',
            'latitude' => '47.214407',
            'longitude' => '-1.552251',
            'name' => 'Basic Fit',
        ],
        '03' => [
            'category' => 'Alimentation',
            'latitude' => '47.217128',
            'longitude' => '-1.555106',
            'name' => 'Dubrown',
        ],
        '04' => [
            'category' => 'Santé',
            'latitude' => '47.212821',
            'longitude' => '-1.555373',
            'name' => 'Le petit marais',
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::ADDRESSES as $key => $add) {
            $userAddress = new UserAddresses();
            $userAddress->setCategory($add['category']);
            $userAddress->setLatitude($add['latitude']);
            $userAddress->setLongitude($add['longitude']);
            $userAddress->setName($add['name']);
            $manager->persist($userAddress);
            $this->addReference('userAddress_'.$key, $userAddress);
        }
        $manager->flush();
    }

}
