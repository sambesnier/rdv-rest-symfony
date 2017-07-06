<?php
/**
 * Created by PhpStorm.
 * User: Samuel Besnier
 * Date: 04/07/2017
 * Time: 19:01
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Address;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AddressFixtures extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        $address = new Address();
        $address->setNumber($faker->numberBetween(1, 200));
        $address->setCity($faker->city);
        $address->setCountry("France");
        $address->setZipcode($faker->postcode);
        $address->setPath($faker->streetName);
        //$address->addPlace($this->getReference('name'));
        $manager->persist($address);
        $manager->flush();

        $address2 = new Address();
        $address2->setNumber($faker->numberBetween(1, 200));
        $address2->setCity($faker->city);
        $address2->setCountry("France");
        $address2->setZipcode($faker->postcode);
        $address2->setPath($faker->streetName);
        //$address2->addPlace($this->getReference('name'));
        $manager->persist($address2);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}