<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    const CATEGORY = [
        '01' => [
            'name' => 'karaoke',
        ],
        '02' => [
            'name' => 'cinema',
        ],
        '03' => [
            'name' => 'velo',
        ],
        '04' => [
            'name' => 'bar',
        ],
        '05' => [
            'name' => 'association',
        ],
        '06' => [
            'name' => 'concert',
        ],
        '07' => [
            'name' => 'massage',
        ],
        '08' => [
            'name' => 'nightclub',
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORY as $key => $cat) {
            $category = new Category();
            $category->setName($cat['name']);
            $manager->persist($category);
            $this->addReference('category_'.$key, $category);
        }
        $manager->flush();
    }
}
