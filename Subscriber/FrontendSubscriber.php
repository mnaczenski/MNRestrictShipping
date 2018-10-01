<?php

namespace MNRestrictShipping\Subscriber;

use Doctrine\Common\Collections\ArrayCollection;
use Enlight\Event\SubscriberInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;



class FrontendSubscriber implements SubscriberInterface
{
     /**
     * @var ContainerInterface
     */
    private $container;
    private $pluginDirectory;


    public function __construct(ContainerInterface $container, $pluginDirectory)
    {
        $this->container = $container;
        $this->pluginDirectory = $pluginDirectory;
    }


    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PreDispatch_Frontend' => 'onPreDispatchFrontend',
            'Enlight_Controller_Action_PreDispatch_Widgets' => 'onPreDispatchFrontend'
        ];
    }

    public function onPreDispatchFrontend(\Enlight_Controller_ActionEventArgs $args)
    {
        $this->container->get('Template')->addTemplateDir(
            $this->pluginDirectory . '/Resources/views/'
        );
    }
}