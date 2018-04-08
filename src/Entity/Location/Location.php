<?php
/**
 * @package    SimpleSmartHome-Brain
 * @author     Kai Grassnick <kai@kai-grassnick.de>
 * @copyright  Copyright (c) 2018, Simple Smart Home
 * @link       http://ssh.kai-grassnick.de/
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html
 */

namespace App\Entity\Location;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Entity\Location\Abstracts\AbstractLocation;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class LocationRoom
 *
 * @ORM\Entity()
 * @ApiResource()
 */
class Location extends AbstractLocation
{

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ApiSubresource()
     * @ORM\OneToMany(targetEntity="App\Entity\Location\LocationRoom", mappedBy="location")
     */
    protected $rooms;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ApiSubresource()
     * @ORM\ManyToMany(targetEntity="App\Entity\Location\LocationLevel", inversedBy="locations", cascade={"persist"})
     */
    protected $levels;


    /**
     * Location constructor.
     */
    public function __construct()
    {
        $this->rooms  = new ArrayCollection();
        $this->levels = new ArrayCollection();
    }


    /**
     * @return Collection
     */
    public function getRooms(): Collection
    {
        return $this->rooms;
    }


    /**
     * @param \App\Entity\Location\LocationRoom $room
     *
     * @return \App\Entity\Location\Location
     */
    public function addRoom(LocationRoom $room): Location
    {
        if (!$this->rooms->contains($room)) {
            $this->rooms->add($room);
        }

        return $this;
    }


    /**
     * @param \App\Entity\Location\LocationRoom $room
     *
     * @return \App\Entity\Location\Location
     */
    public function removeRoom(LocationRoom $room): Location
    {
        if ($this->rooms->contains($room)) {
            $this->rooms->removeElement($room);
        }

        return $this;
    }


    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLevels(): Collection
    {
        return $this->levels;
    }


    /**
     * @param \App\Entity\Location\LocationLevel $level
     *
     * @return \App\Entity\Location\Location
     */
    public function addLevel(LocationLevel $level): Location
    {
        if (!$this->levels->contains($level)) {
            $this->levels->add($level);
        }

        return $this;
    }


    /**
     * @param \App\Entity\Location\LocationLevel $level
     *
     * @return \App\Entity\Location\Location
     */
    public function removeLevel(LocationLevel $level): Location
    {
        if ($this->levels->contains($level)) {
            $this->levels->removeElement($level);
        }

        return $this;
    }
}