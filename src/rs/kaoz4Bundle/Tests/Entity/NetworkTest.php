<?php

namespace rs\kaoz4Bundle\Tests;

use rs\kaoz4Bundle\Entity\Network;

class NetworkTest extends \PHPUnit_Framework_TestCase
{
    
    public function testFromArray()
    {
        $data = array(
            'name' => 'foo',
            'description' => 'bar',
            'active' => true,
            'logo' => 'foo.jpg',
            'url' => 'http://google.com'
        );
        
        $network = new Network();
        $network->fromArray($data);
        
        $this->assertEquals($data['name'], $network->getName());
        $this->assertEquals($data['description'], $network->getDescription());
        $this->assertEquals($data['active'], $network->getActive());
        $this->assertEquals($data['logo'], $network->getLogo());
        $this->assertEquals($data['url'], $network->getUrl());
        $this->assertNull($network->getId());
    }
}
