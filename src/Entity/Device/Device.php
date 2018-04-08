<?php
/**
 * @package    SimpleSmartHome-Brain
 * @author     Kai Grassnick <kai@kai-grassnick.de>
 * @copyright  Copyright (c) 2018, Simple Smart Home
 * @link       http://ssh.kai-grassnick.de/
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html
 */

namespace App\Entity\Device;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 */
class Device
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
     * @var bool Status of this Device.
     *
     * @ORM\Column(type="boolean")
     */
    protected $active = 0;

    /**
     * @var string Name of this Device
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime()
     */
    protected $lastSeen;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Device\DeviceValue", mappedBy="device")
     */
    protected $values;

    /**
     * @var \App\Entity\Device\DeviceType
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Device\DeviceType")
     */
    protected $type;


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
     * @return Device
     */
    public function setId(int $id): Device
    {
        $this->id = $id;

        return $this;
    }


    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }


    /**
     * @param bool $active
     *
     * @return Device
     */
    public function setActive(bool $active): Device
    {
        $this->active = $active;

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
     * @return Device
     */
    public function setName(string $name): Device
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @return null|\DateTime
     */
    public function getLastSeen(): ?\DateTime
    {
        return $this->lastSeen;
    }


    /**
     * @param null|\DateTime $lastSeen
     *
     * @return Device
     */
    public function setLastSeen(?\DateTime $lastSeen): Device
    {
        $this->lastSeen = $lastSeen;

        return $this;
    }


    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getValues(): Collection
    {
        return $this->values;
    }


    /**
     * @param \Doctrine\Common\Collections\Collection $values
     *
     * @return Device
     */
    public function setValues(Collection $values): Device
    {
        $this->values = $values;

        return $this;
    }


    /**
     * @return \App\Entity\Device\DeviceType
     */
    public function getType(): DeviceType
    {
        return $this->type;
    }


    /**
     * @param \App\Entity\Device\DeviceType $type
     *
     * @return Device
     */
    public function setType(DeviceType $type): Device
    {
        $this->type = $type;

        return $this;
    }
}