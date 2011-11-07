<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;
use rs\ProjectUtilitiesBundle\Project\BundleLoader;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        return BundleLoader::create($this)->loadFromFile($this->getRootDir().'/config/bundles.yml');
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
