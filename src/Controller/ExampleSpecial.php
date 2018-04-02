<?php
/**
 * @package    SimpleSmartHome-Brain
 * @author     Kai Grassnick <kai@kai-grassnick.de>
 * @copyright  Copyright (c) 2018, Simple Smart Home
 * @link       http://ssh.kai-grassnick.de/
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html
 */

namespace App\Controller;

use App\Entity\Location\Room;
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
     * @param \App\Entity\Location\Room $room
     *
     * @return \App\Entity\Location\Room
     */
    public function __invoke(Room $room): Room
    {
        // do some magic

        return $room;
    }
}