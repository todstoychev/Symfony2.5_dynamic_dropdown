<?php

namespace Application\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Continent
 *
 * @ORM\Table(name="continents")
 * @ORM\Entity(repositoryClass="Application\MainBundle\Entity\ContinentRepository")
 */
class Continent
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="continent", type="string", length=255)
     */
    private $continent;
    
    /**
     * @ORM\OneToMany(targetEntity="Application\MainBundle\Entity\Country", mappedBy="continent")
     */
    protected $countries;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set continent
     *
     * @param string $continent
     * @return Continent
     */
    public function setContinent($continent)
    {
        $this->continent = $continent;

        return $this;
    }

    /**
     * Get continent
     *
     * @return string 
     */
    public function getContinent()
    {
        return $this->continent;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->countries = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add countries
     *
     * @param \Application\MainBundle\Entity\Country $countries
     * @return Continent
     */
    public function addCountry(\Application\MainBundle\Entity\Country $countries)
    {
        $this->countries[] = $countries;

        return $this;
    }

    /**
     * Remove countries
     *
     * @param \Application\MainBundle\Entity\Country $countries
     */
    public function removeCountry(\Application\MainBundle\Entity\Country $countries)
    {
        $this->countries->removeElement($countries);
    }

    /**
     * Get countries
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCountries()
    {
        return $this->countries;
    }
}
