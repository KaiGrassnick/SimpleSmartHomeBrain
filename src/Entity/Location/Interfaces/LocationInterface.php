<?php
/**
 * @package    SimpleSmartHome-Brain
 * @author     Kai Grassnick <kai@kai-grassnick.de>
 * @copyright  Copyright (c) 2018, Simple Smart Home
 * @link       http://ssh.kai-grassnick.de/
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html
 */

namespace App\Entity\Location\Interfaces;


interface LocationInterface
{

    /**
     * @return int
     */
    public function getId(): int;


    /**
     * @param int $id
     *
     * @return \App\Entity\Location\Interfaces\LocationInterface
     */
    public function setId(int $id): LocationInterface;


    /**
     * @return bool
     */
    public function isActive(): bool;


    /**
     * @param bool $active
     *
     * @return \App\Entity\Location\Interfaces\LocationInterface
     */
    public function setActive(bool $active): LocationInterface;


    /**
     * @return string
     */
    public function getName(): string;


    /**
     * @param string $name
     *
     * @return \App\Entity\Location\Interfaces\LocationInterface
     */
    public function setName(string $name): LocationInterface;


    /**
     * @return string
     */
    public function __toString(): string;
}