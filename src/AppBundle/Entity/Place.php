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
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;

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
     *     inversedBy="places",
     *     cascade={"persist"}
     * )
     */
    private $address;

    /**
     * @var Week
     *
     * @ORM\OneToMany(
     *     targetEntity="AppBundle\Entity\Week",
     *     mappedBy="place",
     *     cascade={"persist"}
     * )
     */
    private $weeks;

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

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Place
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->weeks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add week
     *
     * @param \AppBundle\Entity\Week $week
     *
     * @return Place
     */
    public function addWeek(\AppBundle\Entity\Week $week)
    {
        $this->weeks[] = $week;

        return $this;
    }

    /**
     * Remove week
     *
     * @param \AppBundle\Entity\Week $week
     */
    public function removeWeek(\AppBundle\Entity\Week $week)
    {
        $this->weeks->removeElement($week);
    }

    /**
     * Get weeks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWeeks()
    {
        return $this->weeks;
    }
}
