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
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/room")
 */
class RoomController extends SSHBController
{

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \App\Entity\Location\Room                 $room
     *
     * @return \FOS\RestBundle\View\View
     *
     * @Rest\Get("/{roomId}", requirements={"roomId" = "\d+"})
     * @ParamConverter("room", options={"mapping": {"roomId": "id"}})
     */
    public function getRoomAction(Request $request, Room $room): View
    {
        return $this->view($room, Response::HTTP_OK);
    }


    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \FOS\RestBundle\View\View
     *
     * @Rest\Post()
     */
    public function createRoomAction(Request $request): View
    {
        $name   = $request->request->get('name', null);
        $active = $request->request->get('active', null);

        $room = (new Room())
            ->setName($name)
            ->setActive($active);

        $entityManager = $this->getObjectManager();
        $entityManager->persist($room);
        $entityManager->flush();

        return $this->view($room, Response::HTTP_CREATED);
    }


    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \App\Entity\Location\Room                 $room
     *
     * @return \FOS\RestBundle\View\View
     *
     * @Rest\Patch("/{roomId}", requirements={"roomId" = "\d+"})
     * @ParamConverter("room", options={"mapping": {"roomId": "id"}})
     */
    public function updateRoomAction(Request $request, Room $room): View
    {
        $name   = $request->request->get('name', $room->getName());
        $active = $request->request->get('active', $room->isActive());

        $room
            ->setName($name)
            ->setActive($active);

        $entityManager = $this->getObjectManager();
        $entityManager->persist($room);
        $entityManager->flush();

        return $this->view($room, Response::HTTP_OK);
    }


    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \App\Entity\Location\Room                 $room
     *
     * @return \FOS\RestBundle\View\View
     *
     * @Rest\Delete("/{roomId}", requirements={"roomId" = "\d+"})
     * @ParamConverter("room", options={"mapping": {"roomId": "id"}})
     */
    public function deleteRoomAction(Request $request, Room $room): View
    {
        $entityManager = $this->getObjectManager();
        $entityManager->remove($room);
        $entityManager->flush();

        return $this->view($room, Response::HTTP_OK);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \FOS\RestBundle\View\View
     *
     * @Rest\Get()
     */
    public function getAllRoomsAction(Request $request): View
    {
        $rooms = $this->getDoctrine()->getRepository(Room::class)->findAll();

        return $this->view($rooms, Response::HTTP_OK);
    }
}