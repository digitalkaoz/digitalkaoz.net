<?php

namespace rs\kaoz4Bundle\Tests;

use rs\kaoz4Bundle\Entity\Project;

class ProjectTest extends \PHPUnit_Framework_TestCase
{
    
    public function testFromArray()
    {
        $data = array(
            'name' => 'foo',
            'description' => 'bar',
            'active' => true,
            'url' => 'http://google.com',
            'abstract' => 'foo bar',
            'logo' => 'foo.jpg'
        );
        
        $project = new Project();
        $project->fromArray($data);
        
        $this->assertEquals($data['name'], $project->getName());
        $this->assertEquals($data['description'], $project->getDescription());
        $this->assertEquals($data['active'], $project->getActive());
        $this->assertEquals($data['abstract'], $project->getAbstract());
        $this->assertEquals($data['url'], $project->getUrl());
        $this->assertEquals($data['logo'], $project->getLogo());
        $this->assertNull($project->getId());
                
        //$this->assertNotNull($project->getCreatedAt());
        //$this->assertNotNull($project->getUpdatedAt());
   }
}
