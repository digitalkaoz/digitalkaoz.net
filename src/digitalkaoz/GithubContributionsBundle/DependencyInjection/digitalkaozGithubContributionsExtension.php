<?php

namespace digitalkaoz\GithubContributionsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class digitalkaozGithubContributionsExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $config = $this->processConfiguration(new Configuration(), $configs);

        $this->processFactory($container, $config);
        $this->processController($container, $config);
    }

    /**
     * @param ContainerBuilder $container
     * @param                  $config
     * @throws \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    private function processFactory(ContainerBuilder $container, $config)
    {
        $service = $container->getDefinition('digitalkaoz_github_contributions.factory');

        //add the cache service if set
        if (isset($config['cache_service'])) {
//            if (!$container->hasDefinition($config['cache_service'])) {
//                throw new InvalidConfigurationException('service "' . $config['cache_service'] . '" doesnt exists');
//            }

            $service->addArgument(new Reference($config['cache_service']));
        }

        //add the api token if set
        if (isset($config['token'])) {
            $service->addArgument($config['api_token']);
        }
    }

    private function processController(ContainerBuilder $container, $config)
    {
        $service = $container->getDefinition('digitalkaoz_github_contributions.controller');

        $service->addArgument($config['templates']);

        if ($config['username']) {
            $service->addMethodCall('setUser',array($config['username']));
        }
    }

}
