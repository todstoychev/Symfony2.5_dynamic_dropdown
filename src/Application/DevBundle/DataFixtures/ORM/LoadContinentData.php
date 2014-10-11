<?php

namespace Application\DevBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Application\MainBundle\Entity\Continent;

class LoadContinentData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        // Read the JSON file and process JSON data
        $json = file_get_contents('continents.json', true);
        $continents = json_decode($json);
        
        foreach ($continents as $continent) {
            $entity = new Continent();
            $entity->setContinent($continent->continent);
            $manager->persist($entity);
            $manager->flush();
            
            // Set references
            $this->addReference('continent-' . $entity->getId(), $entity);
        }
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}