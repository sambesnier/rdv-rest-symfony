<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Day
 *
 * @ORM\Table(name="days")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DayRepository")
 */
class Day
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
     * @ORM\Column(name="dayOfWeek", type="integer")
     */
    private $dayOfWeek;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dayDate", type="date")
     */
    private $dayDate;

    /**
     * @var Rdv
     *
     * @ORM\ManyToOne(
     *     targetEntity="AppBundle\Entity\Rdv",
     *     inversedBy="day"
     * )
     */
    private $rdvs;

    /**
     * @var Week
     *
     * @ORM\OneToMany(
     *     targetEntity="AppBundle\Entity\Week",
     *     mappedBy="days"
     * )
     */
    private $week;


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
     * Set dayOfWeek
     *
     * @param integer $dayOfWeek
     *
     * @return Day
     */
    public function setDayOfWeek($dayOfWeek)
    {
        $this->dayOfWeek = $dayOfWeek;

        return $this;
    }

    /**
     * Get dayOfWeek
     *
     * @return int
     */
    public function getDayOfWeek()
    {
        return $this->dayOfWeek;
    }

    /**
     * Set dayDate
     *
     * @param \DateTime $dayDate
     *
     * @return Day
     */
    public function setDayDate($dayDate)
    {
        $this->dayDate = $dayDate;

        return $this;
    }

    /**
     * Get dayDate
     *
     * @return \DateTime
     */
    public function getDayDate()
    {
        return $this->dayDate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->week = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set rdvs
     *
     * @param \AppBundle\Entity\Rdv $rdvs
     *
     * @return Day
     */
    public function setRdvs(\AppBundle\Entity\Rdv $rdvs = null)
    {
        $this->rdvs = $rdvs;

        return $this;
    }

    /**
     * Get rdvs
     *
     * @return \AppBundle\Entity\Rdv
     */
    public function getRdvs()
    {
        return $this->rdvs;
    }

    /**
     * Add week
     *
     * @param \AppBundle\Entity\Week $week
     *
     * @return Day
     */
    public function addWeek(\AppBundle\Entity\Week $week)
    {
        $this->week[] = $week;

        return $this;
    }

    /**
     * Remove week
     *
     * @param \AppBundle\Entity\Week $week
     */
    public function removeWeek(\AppBundle\Entity\Week $week)
    {
        $this->week->removeElement($week);
    }

    /**
     * Get week
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWeek()
    {
        return $this->week;
    }
}
