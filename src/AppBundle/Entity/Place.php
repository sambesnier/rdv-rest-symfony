<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Place
 *
 * @ORM\Table(name="places")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlaceRepository")
 */
class Place
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="rdvDuration", type="integer")
     */
    private $rdvDuration;

    /**
     * @var Address
     *
     * @ORM\ManyToOne(
     *     targetEntity="AppBundle\Entity\Address",
     *     inversedBy="places"
     * )
     */
    private $address;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set rdvDuration
     *
     * @param integer $rdvDuration
     *
     * @return Place
     */
    public function setRdvDuration($rdvDuration)
    {
        $this->rdvDuration = $rdvDuration;

        return $this;
    }

    /**
     * Get rdvDuration
     *
     * @return int
     */
    public function getRdvDuration()
    {
        return $this->rdvDuration;
    }

    /**
     * Set address
     *
     * @param \AppBundle\Entity\Address $address
     *
     * @return Place
     */
    public function setAddress(\AppBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \AppBundle\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }
}
