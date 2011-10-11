<?php

namespace rs\kaoz4Bundle\Tests;

use rs\kaoz4Bundle\Entity\Post;

class PostTest extends \PHPUnit_Framework_TestCase
{
    
    public function testFromArray()
    {
        $data = array(
            'title' => 'foo',
            'text' => 'bar',
            'active' => true,
            'abstract' => 'foo bar',
            'logo' => 'foo.jpg'
        );
        
        $post = new Post();
        $post->fromArray($data);
        
        $this->assertEquals($data['title'], $post->getTitle());
        $this->assertEquals($data['text'], $post->getText());
        $this->assertEquals($data['active'], $post->getActive());
        $this->assertEquals($data['abstract'], $post->getAbstract());
        $this->assertEquals($data['logo'], $post->getLogo());
        $this->assertNull($post->getId());
        
        //$this->assertNotNull($post->getCreatedAt());
        //$this->assertNotNull($post->getUpdatedAt());
    }
}
