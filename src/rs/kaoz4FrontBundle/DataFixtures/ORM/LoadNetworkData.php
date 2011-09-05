<?php

namespace rs\kaoz4FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;

use rs\kaoz4FrontBundle\Entity\Network;

class LoadNetworkData extends AbstractFixture implements OrderedFixtureInterface
{
    
    public function load($manager)
    {
        $networks = $this->loadFromYaml();
        
        foreach($networks as $name => $data)
        {
            $network = new Network();
            $network->fromArray($data);
            
            $this->addReference($name, $network);
            
            $manager->persist($network);
            $manager->flush();
        }
    }
    
    protected function loadFromYaml()
    {
        return Yaml::parse(__DIR__.'/../../Resources/fixtures/network_fixtures.yml');
    }
    
    public function getOrder()
    {
        return 1;
    }    
}