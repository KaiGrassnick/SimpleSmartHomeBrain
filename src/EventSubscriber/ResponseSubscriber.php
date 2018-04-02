<?php
/**
 * @package    SimpleSmartHome-Brain
 * @author     Kai Grassnick <kai@kai-grassnick.de>
 * @copyright  Copyright (c) 2018, Simple Smart Home
 * @link       http://ssh.kai-grassnick.de/
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html
 */

namespace App\EventSubscriber;

use App\Utils\Version;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ResponseSubscriber implements EventSubscriberInterface
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
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::RESPONSE => [
                'onKernelResponse',
                10,
            ],
        ];
    }


    /**
     * Subscriber method to log every response.
     *
     * @param FilterResponseEvent $event
     *
     * @throws \Exception
     */
    public function onKernelResponse(FilterResponseEvent $event): void
    {
        $response = $event->getResponse();
        // Attach new header
        $response->headers->add(['X-API-VERSION' => $this->version->getString()]);
    }
}