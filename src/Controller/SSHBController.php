<?php
/**
 * @package    SimpleSmartHome-Brain
 * @author     Kai Grassnick <kai@kai-grassnick.de>
 * @copyright  Copyright (c) 2018, Simple Smart Home
 * @link       http://ssh.kai-grassnick.de/
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html
 */

namespace App\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

abstract class SSHBController extends Controller
{

    /**
     * @return \Doctrine\Common\Persistence\ObjectManager
     */
    protected function getObjectManager(): ObjectManager
    {
        return $this->getDoctrine()->getManager();
    }
}