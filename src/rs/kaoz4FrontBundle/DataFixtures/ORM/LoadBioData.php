<?php

namespace rs\kaoz4FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;

use rs\kaoz4FrontBundle\Entity\Bio;

class LoadBioData extends AbstractFixture implements OrderedFixtureInterface
{
    
    public function load($manager)
    {
        $categorys = $this->loadFromYaml();
        
        foreach($categorys as $cname => $category)
        {
            foreach($category as $name => $data)
            {
                $bio = new Bio();
                $data['name'] = isset($data['name']) ? $data['name'] : $name;
                $data['category'] = $cname;
                $bio->fromArray($data);

                $this->addReference($cname.'-'.$name, $bio);

                $manager->persist($bio);
                $manager->flush();
            }
        }
    }
    
    protected function loadFromYaml()
    {
        return Yaml::parse(__DIR__.'/../../Resources/fixtures/bio_fixtures.yml');
    }
    
    public function getOrder()
    {
        return 2;
    }    
}