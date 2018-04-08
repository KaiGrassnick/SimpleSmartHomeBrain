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
 * Class LocationRoom
 *
 * @ORM\Entity()
 * @ApiResource(itemOperations={
 *     "get",
 *     "special"={
 *         "method"="GET",
 *         "path"="/room/{id}/special",
 *         "controller"=App\Controller\ExampleSpecial::class
 *     }
 * })
 */
class LocationRoom extends AbstractLocation
{

    /**
     * @var \App\Entity\Location\Location
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Location\Location", inversedBy="rooms", cascade={"persist"})
     */
    protected $location;

    /**
     * @var \App\Entity\Location\LocationLevel
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Location\LocationLevel", inversedBy="rooms", cascade={"persist"})
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
     * @return \App\Entity\Location\LocationRoom
     */
    public function setLocation(Location $location): LocationRoom
    {
        $this->location = $location;

        return $this;
    }


    /**
     * @return \App\Entity\Location\LocationLevel
     */
    public function getLevel(): LocationLevel
    {
        return $this->level;
    }


    /**
     * @param \App\Entity\Location\LocationLevel $level
     *
     * @return \App\Entity\Location\LocationRoom
     */
    public function setLevel(LocationLevel $level): LocationRoom
    {
        $this->level = $level;

        return $this;
    }
}