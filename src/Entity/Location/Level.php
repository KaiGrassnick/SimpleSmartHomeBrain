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
 * Class Room
 *
 * @ORM\Entity()
 * @ApiResource()
 */
class Level extends AbstractLocation
{

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Location\Location", mappedBy="levels")
     */
    protected $locations;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ApiSubresource()
     * @ORM\OneToMany(targetEntity="App\Entity\Location\Room", mappedBy="level")
     */
    protected $rooms;


    /**
     * Location constructor.
     */
    public function __construct()
    {
        $this->locations = new ArrayCollection();
        $this->rooms     = new ArrayCollection();
    }


    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLocations(): Collection
    {
        return $this->locations;
    }


    /**
     * @param \App\Entity\Location\Location $location
     *
     * @return \App\Entity\Location\Level
     */
    public function addLocation(Location $location): Level
    {
        if (!$this->locations->contains($location)) {
            $this->locations->add($location);
        }

        return $this;
    }


    /**
     * @param \App\Entity\Location\Location $location
     *
     * @return \App\Entity\Location\Level
     */
    public function removeLocation(Location $location): Level
    {
        if ($this->locations->contains($location)) {
            $this->locations->removeElement($location);
        }

        return $this;
    }


    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRooms(): Collection
    {
        return $this->rooms;
    }


    /**
     * @param \App\Entity\Location\Room $room
     *
     * @return \App\Entity\Location\Level
     */
    public function addRoom(Room $room): Level
    {
        if (!$this->rooms->contains($room)) {
            $this->rooms->add($room);
        }

        return $this;
    }


    /**
     * @param \App\Entity\Location\Room $room
     *
     * @return \App\Entity\Location\Level
     */
    public function removeRoom(Room $room): Level
    {
        if ($this->rooms->contains($room)) {
            $this->rooms->removeElement($room);
        }

        return $this;
    }
}