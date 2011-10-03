<?php


namespace rs\kaoz4Bundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;

/**
 * base class for loading fixture data entirly from aml
 *
 * @author caziel
 * @package
 */
abstract class BaseFixtureLoader extends AbstractFixture implements OrderedFixtureInterface
{
    protected $cls, $file, $orderno;

    /**
     * loads data from an yaml file into an array
     * 
     * @return array
     */
    protected function loadFromYaml()
    {
        return Yaml::parse(__DIR__.$this->file);
    }        
    
    /*
     * defines the order in which this fixture is loaded
     */
    public function getOrder()
    {
        return $this->orderno;
    }     
    
    /**
     * creates an object from an array and saves it to the database
     * 
     * @param type $manager 
     */
    public function load($manager)
    {
        $objects = $this->loadFromYaml();
        
        foreach($objects as $name => $data)
        {
            $cls = $this->cls;            
            $object = new $cls();
            $object->fromArray($data);
            
            $this->addReference($this->getRefname().'-'.$name, $object);
            
            $manager->persist($object);
            $manager->flush();
        }
    }
    
    /**
     * define the reference name for later usage
     * 
     * @return type 
     */
    protected function getRefname()
    {
        $refname = explode('/', $this->cls);
        
        return array_pop($refname);
    }
}
