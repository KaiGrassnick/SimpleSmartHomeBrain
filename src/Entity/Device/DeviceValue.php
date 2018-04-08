<?php
/**
 * @package    SimpleSmartHome-Brain
 * @author     Kai Grassnick <kai@kai-grassnick.de>
 * @copyright  Copyright (c) 2018, Simple Smart Home
 * @link       http://ssh.kai-grassnick.de/
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html
 */

namespace App\Entity\Device;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Timestampable;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity()
 */
class DeviceValue implements Timestampable
{

    use TimestampableEntity;

    /**
     * @var int The id of this Value.
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \App\Entity\Device\Device Realated Device for this Value
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Device\Device", inversedBy="values")
     */
    protected $device;

    /**
     * @var array Value for this Entry
     *
     * @ORM\Column(type="json_array")
     */
    protected $value = [];


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @param int $id
     *
     * @return DeviceValue
     */
    public function setId(int $id): DeviceValue
    {
        $this->id = $id;

        return $this;
    }


    /**
     * @return \App\Entity\Device\Device
     */
    public function getDevice(): Device
    {
        return $this->device;
    }


    /**
     * @param \App\Entity\Device\Device $device
     *
     * @return DeviceValue
     */
    public function setDevice(Device $device): DeviceValue
    {
        $this->device = $device;

        return $this;
    }


    /**
     * @return array
     */
    public function getValue(): array
    {
        return $this->value;
    }


    /**
     * @param array $value
     *
     * @return DeviceValue
     */
    public function setValue(array $value): DeviceValue
    {
        $this->value = $value;

        return $this;
    }
}