<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use rs\ProjectUtilitiesBundle\Project\BundleLoader;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = BundleLoader::create($this)->loadFromFile($this->getRootDir().'/config/bundles.yml');
        
/*        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new JMS\DebuggingBundle\JMSDebuggingBundle($this);
        }
  */      
        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
