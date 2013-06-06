<?php

namespace rs\kaoz4Bundle;

use Symfony\Component\HttpKernel\Kernel;

/**
 * Description of kaoz4Kernel
 *
 * @author caziel
 */
abstract class kaoz4Kernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            
            new \Symfony\Bundle\TwigBundle\TwigBundle(),
            new \Symfony\Bundle\MonologBundle\MonologBundle(),
            new \Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new \Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new \Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new \Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new \rs\kaoz4Bundle\rskaoz4Bundle(),
            new \Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new \Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new \Mopa\Bundle\BootstrapBundle\MopaBootstrapBundle(),
            new \Liip\DoctrineCacheBundle\LiipDoctrineCacheBundle(),
        );

        if('dev' == $this->getEnvironment()) {
            $bundles = array_merge($bundles, array(
                new \Symfony\Bundle\WebProfilerBundle\WebProfilerBundle(),
                new \Sensio\Bundle\DistributionBundle\SensioDistributionBundle(),
                new \Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle(),
                new \Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
                new \Elao\WebProfilerExtraBundle\WebProfilerExtraBundle(),
            ));
        }

        if('test' == $this->getEnvironment()) {
            $bundles = array_merge($bundles, array(
                new \Symfony\Bundle\WebProfilerBundle\WebProfilerBundle(),
                new \Elao\WebProfilerExtraBundle\WebProfilerExtraBundle(),
                new \Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            ));
        }

        return $bundles;
    }    
}
