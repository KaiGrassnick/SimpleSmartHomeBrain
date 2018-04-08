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
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 */
class DeviceType
{

    /**
     * @var int The id of this Device.
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string Name of this Device
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    protected $name;


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
     * @return DeviceType
     */
    public function setId(int $id): DeviceType
    {
        $this->id = $id;

        return $this;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @param string $name
     *
     * @return DeviceType
     */
    public function setName(string $name): DeviceType
    {
        $this->name = $name;

        return $this;
    }
}