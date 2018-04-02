<?php
/**
 * @package    SimpleSmartHome-Brain
 * @author     Kai Grassnick <kai@kai-grassnick.de>
 * @copyright  Copyright (c) 2018, Simple Smart Home
 * @link       http://ssh.kai-grassnick.de/
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html
 */

namespace App\Controller;

use App\Utils\Version;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/")
 */
class DefaultController extends SSHBController
{

    /**
     * @var \App\Utils\Version
     */
    protected $version;


    /**
     * DefaultController constructor.
     *
     * @param \App\Utils\Version $version
     */
    public function __construct(Version $version)
    {
        $this->version = $version;
    }


    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \FOS\RestBundle\View\View
     *
     * @Rest\Get()
     */
    public function indexAction(Request $request): View
    {
        $data            = [];
        $data["version"] = $this->version->getString();

        return $this->view($data, Response::HTTP_OK);
    }
}