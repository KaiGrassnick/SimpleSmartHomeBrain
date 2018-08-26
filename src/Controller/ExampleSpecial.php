<?php
/**
 * @package    SimpleSmartHome-Brain
 * @author     Kai Grassnick <kai@kai-grassnick.de>
 * @copyright  Copyright (c) 2018, Simple Smart Home
 * @link       http://ssh.kai-grassnick.de/
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html
 */

namespace App\Controller;

use App\Entity\Location\LocationRoom;
use App\Utils\Version;

class ExampleSpecial
{

    /**
     * @var \App\Utils\Version
     */
    protected $version;


    /**
     * ExampleController constructor.
     *
     * @param \App\Utils\Version $version
     */
    public function __construct(Version $version)
    {
        $this->version = $version;
    }


    /**
     * @param \App\Entity\Location\LocationRoom $room
     *
     * @return \App\Entity\Location\LocationRoom
     */
    public function __invoke(LocationRoom $room): LocationRoom
    {
        // do some magic

        return $room;
    }
}