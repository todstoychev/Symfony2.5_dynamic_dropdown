<?php

namespace Application\DevBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Application\MainBundle\Entity\Country;

class LoadCountryData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Read the JSON file and process JSON data
        $json = file_get_contents('countries.json', true);
        $countries = json_decode($json);
//        var_dump($countries[0]->continent_id); die();
        
        foreach ($countries as $country) {
            $entity = new Country();
            $entity->setCountry($country->country);
            $entity->setContinent($this->getReference('continent-' . $country->continent_id));
            $manager->persist($entity);
        }
        
        $manager->flush();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}