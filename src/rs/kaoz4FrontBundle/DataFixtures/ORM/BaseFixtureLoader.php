<?php


namespace rs\kaoz4FrontBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;

/**
 * Description of BaseFixtureLoader
 *
 * @author caziel
 */
abstract class BaseFixtureLoader extends AbstractFixture implements OrderedFixtureInterface
{
    //put your code here
    protected $cls, $file, $orderno;
    
    protected function loadFromYaml()
    {
        return Yaml::parse(__DIR__.$this->file);
    }        
    
    public function getOrder()
    {
        return $this->orderno;
    }     
    
    public function load($manager)
    {
        $networks = $this->loadFromYaml();
        
        foreach($networks as $name => $data)
        {
            $cls = $this->cls;            
            $network = new $cls();
            $network->fromArray($data);
            
            $this->addReference($this->getRefname().'-'.$name, $network);
            
            $manager->persist($network);
            $manager->flush();
        }
    }
    
    protected function getRefname()
    {
        $refname = explode('/', $this->cls);
        
        return array_pop($refname);
    }
}
