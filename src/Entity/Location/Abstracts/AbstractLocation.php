<?php
/**
 * @package    SimpleSmartHome-Brain
 * @author     Kai Grassnick <kai@kai-grassnick.de>
 * @copyright  Copyright (c) 2018, Simple Smart Home
 * @link       http://ssh.kai-grassnick.de/
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html
 */

namespace App\Entity\Location\Abstracts;

use App\Entity\Location\Interfaces\LocationInterface;
use Doctrine\ORM\Mapping as ORM;

abstract class AbstractLocation implements LocationInterface
{

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    protected $active;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
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
     * @return \App\Entity\Location\Interfaces\LocationInterface
     */
    public function setId(int $id): LocationInterface
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
     * @return \App\Entity\Location\Interfaces\LocationInterface
     */
    public function setActive(bool $active): LocationInterface
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
     * @return \App\Entity\Location\Interfaces\LocationInterface
     */
    public function setName(string $name): LocationInterface
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getName() ?? "New " . self::class;
    }
}