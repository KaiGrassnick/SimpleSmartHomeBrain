<?php
/**
 * @project    SimpleSmartHome-Brain
 * @author     Kai Grassnick <kai@kai-grassnick.de>
 * @copyright  Copyright (c) 2018, Simple Smart Home
 * @link       http://ssh.kai-grassnick.de/
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html
 */

namespace App\Entity\Location;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Entity\Location\Abstracts\AbstractLocation;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Room
 *
 * @ORM\Entity()
 * @ApiResource()
 */
class Room extends AbstractLocation
{

    /**
     * @var \App\Entity\Location\Location
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Location\Location", inversedBy="rooms", cascade={"persist"})
     */
    protected $location;

    /**
     * @var \App\Entity\Location\Level
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Location\Level", inversedBy="rooms", cascade={"persist"})
     */
    protected $level;


    /**
     * @return \App\Entity\Location\Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }


    /**
     * @param \App\Entity\Location\Location $location
     *
     * @return \App\Entity\Location\Room
     */
    public function setLocation(Location $location): Room
    {
        $this->location = $location;

        return $this;
    }


    /**
     * @return \App\Entity\Location\Level
     */
    public function getLevel(): Level
    {
        return $this->level;
    }


    /**
     * @param \App\Entity\Location\Level $level
     *
     * @return \App\Entity\Location\Room
     */
    public function setLevel(Level $level): Room
    {
        $this->level = $level;

        return $this;
    }
}