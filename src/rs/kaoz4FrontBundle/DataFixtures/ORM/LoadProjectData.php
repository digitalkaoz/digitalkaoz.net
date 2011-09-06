<?php

namespace rs\kaoz4FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;

use rs\kaoz4FrontBundle\Entity\Project;

class LoadProjectData extends AbstractFixture implements OrderedFixtureInterface
{
    
    public function load($manager)
    {
        $projects = $this->loadFromYaml();
        
        foreach($projects as $name => $data)
        {
            $project = new Project();
            $project->fromArray($data);
            
            $this->addReference($name, $project);
            
            $manager->persist($project);
            $manager->flush();
        }
    }
    
    protected function loadFromYaml()
    {
        return Yaml::parse(__DIR__.'/../../Resources/fixtures/project_fixtures.yml');
    }
    
    public function getOrder()
    {
        return 3;
    }    
}