<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\DoctrineBundle\DoctrineBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new rs\kaoz4Bundle\rskaoz4Bundle(),
            new rs\kaoz4FrontBundle\rskaoz4FrontBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Knp\Bundle\LastTweetsBundle\KnpLastTweetsBundle(),
            new Knp\Bundle\ZendCacheBundle\KnpZendCacheBundle(),
            new Knp\Bundle\DisqusBundle\KnpDisqusBundle(),
            new JMS\AopBundle\JMSAopBundle(),
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            new IHQS\ContactBundle\IHQSContactBundle(),
            new Mopa\BootstrapBundle\MopaBootstrapBundle(),
            new Ornicar\AkismetBundle\OrnicarAkismetBundle(),
            new FOQ\ElasticaBundle\FOQElasticaBundle(),
            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            new Blage\ConnectBundle\BlageConnectBundle(),
        );

        if('dev' == $this->getEnvironment()) {
            $bundles = array_merge($bundles, array(
                new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle(),
            #    new Sensio\Bundle\DistributionBundle\SensioDistributionBundle(),
                new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle(),
                new Symfony\Bundle\DoctrineFixturesBundle\DoctrineFixturesBundle(),
                new Elao\WebProfilerExtraBundle\WebProfilerExtraBundle()
            ));
        }

        if('test' == $this->getEnvironment()) {
            $bundles = array_merge($bundles, array(
                new Behat\MinkBundle\MinkBundle(),
                new Behat\BehatBundle\BehatBundle(),
                new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle(),
                new Elao\WebProfilerExtraBundle\WebProfilerExtraBundle(),
                new Symfony\Bundle\DoctrineFixturesBundle\DoctrineFixturesBundle(),
            ));
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
