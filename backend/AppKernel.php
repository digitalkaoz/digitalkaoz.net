<?php

use rs\kaoz4Bundle\kaoz4Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends kaoz4Kernel
{
    public function registerBundles()
    {
        $bundles = parent::registerBundles();
        
        $bundles = array_merge($bundles,array(
            new rs\kaoz4BackendBundle\rskaoz4BackendBundle(),            
            new JMS\AopBundle\JMSAopBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),
            new Sonata\jQueryBundle\SonatajQueryBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new FOS\UserBundle\FOSUserBundle(),
        ));
        
        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
