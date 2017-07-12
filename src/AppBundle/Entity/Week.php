<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Week
 *
 * @ORM\Table(name="weeks")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WeekRepository")
 */
class Week
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
     * @ORM\Column(name="weekNumber", type="integer")
     */
    private $weekNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="year", type="integer")
     */
    private $year;

    /**
     * @var Day
     *
     * @ORM\ManyToOne(
     *     targetEntity="AppBundle\Entity\Day",
     *     inversedBy="week"
     * )
     */
    private $days;

    /**
     * @var Place
     *
     * @ORM\ManyToOne(
     *     targetEntity="AppBundle\Entity\Place",
     *     inversedBy="weeks"
     * )
     */
    private $place;

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
     * Set weekNumber
     *
     * @param integer $weekNumber
     *
     * @return Week
     */
    public function setWeekNumber($weekNumber)
    {
        $this->weekNumber = $weekNumber;

        return $this;
    }

    /**
     * Get weekNumber
     *
     * @return int
     */
    public function getWeekNumber()
    {
        return $this->weekNumber;
    }

    /**
     * Set year
     *
     * @param integer $year
     *
     * @return Week
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set days
     *
     * @param \AppBundle\Entity\Day $days
     *
     * @return Week
     */
    public function setDays(\AppBundle\Entity\Day $days = null)
    {
        $this->days = $days;

        return $this;
    }

    /**
     * Get days
     *
     * @return \AppBundle\Entity\Day
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * Set place
     *
     * @param \AppBundle\Entity\Place $place
     *
     * @return Week
     */
    public function setPlace(\AppBundle\Entity\Place $place = null)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Get place
     *
     * @return \AppBundle\Entity\Place
     */
    public function getPlace()
    {
        return $this->place;
    }
}
