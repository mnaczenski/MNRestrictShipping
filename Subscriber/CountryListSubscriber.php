<?php

namespace MNRestrictShipping\Subscriber;

use Doctrine\Common\Collections\ArrayCollection;
use Enlight\Event\SubscriberInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;



class CountryListSubscriber implements SubscriberInterface
{
     /**
     * @var ContainerInterface
     */
    private $container;


    public function __construct(ContainerInterface $container, $pluginDirectory)
    {
        $this->container = $container;
    }


    public static function getSubscribedEvents()
    {
        return [
            'Shopware_Modules_Admin_GetCountries_FilterResult' => 'onFilterCountries',
        ];
    }

    public function onFilterCountries(\Enlight_Event_EventArgs $args)
    {
        $countryList = $args->getReturn();
        $service = $this->container->get('shopware_attribute.data_loader');
        $i = 0;

        foreach ($countryList as $countries) {
            $country['attributes'] = $service->load('s_core_countries_attributes', $countries['id']);
            $countryAttributes[$i] = $countries + $country;
            $i++;
        }
        return $countryAttributes;
    }
}