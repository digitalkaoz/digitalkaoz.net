<?php

namespace rs\kaoz4Bundle\Tests;

use rs\kaoz4Bundle\Entity\Bio;

class BioTest extends \PHPUnit_Framework_TestCase
{
    
    public function testFromArray()
    {
        $data = array(
            'name' => 'foo',
            'category' => 'bar',
            'active' => true,
            'url' => 'http://google.com',
            'level' => '***',
            'period' => '09/2001 - 03/2008'
        );
        
        $bio = new Bio();
        $bio->fromArray($data);
        
        $this->assertEquals($data['name'], $bio->getName());
        $this->assertEquals($data['category'], $bio->getCategory());
        $this->assertEquals($data['active'], $bio->getActive());
        $this->assertEquals($data['level'], $bio->getLevel());
        $this->assertEquals($data['url'], $bio->getUrl());
        $this->assertEquals($data['period'], $bio->getPeriod());
        $this->assertNull($bio->getId());
    }
}
