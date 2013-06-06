<?php

use rs\kaoz4Bundle\kaoz4Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends kaoz4Kernel
{
    public function registerBundles()
    {
        $bundles = parent::registerBundles();
        
        $bundles = array_merge($bundles,array(
            new rs\kaoz4FrontBundle\rskaoz4FrontBundle(),
            new Knp\Bundle\LastTweetsBundle\KnpLastTweetsBundle(),
            new Knp\Bundle\DisqusBundle\KnpDisqusBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Ornicar\AkismetBundle\OrnicarAkismetBundle(),
            new Blage\ConnectBundle\BlageConnectBundle(),
            new FOS\ElasticaBundle\FOSElasticaBundle(),
            new KPhoen\ContactBundle\KPhoenContactBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new SensioLabs\Bundle\ConnectBundle\SensioLabsConnectBundle(),
        ));
        
        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
