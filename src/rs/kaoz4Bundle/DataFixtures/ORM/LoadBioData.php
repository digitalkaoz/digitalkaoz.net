<?php

namespace rs\kaoz4Bundle\DataFixtures\ORM;

class LoadBioData extends BaseFixtureLoader
{
    protected $file = '/../../Resources/fixtures/bio_fixtures.yml';
    protected $orderno = 2;
    protected $cls = 'rs\kaoz4Bundle\Entity\Bio';
    
    public function load($manager)
    {
        $categorys = $this->loadFromYaml();
        
        foreach($categorys as $cname => $category)
        {
            foreach($category as $name => $data)
            {
                $cls = $this->cls;
                $bio = new $cls();
                $data['name'] = isset($data['name']) ? $data['name'] : $name;
                $data['category'] = $cname;
                $bio->fromArray($data);

                $this->addReference($cname.'-'.$name, $bio);

                $manager->persist($bio);
                $manager->flush();
            }
        }
    }
}
