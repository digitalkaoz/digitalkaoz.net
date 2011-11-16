<?php

namespace rs\kaoz4FrontBundle\Tests;

use rs\kaoz4FrontBundle\Test\BaseControllerTest;

class BlogControllerTest extends BaseControllerTest
{
    public function testIndex()
    {
        $session = $this->getSession('symfony');
        $session->visit($this->base.'/blog');

        $this->assertEquals($session->getStatusCode(), 200);
        
        foreach($this->getPosts() as $post)
        {
            $this->assertTrue($session->getPage()->has('css', 'a[href="/blog/article/'.$post->getSlug().'"]'));
        }        
    }
    
    public function testDetail()
    {
        $session = $this->getSession('symfony');

        foreach($this->getPosts() as $post)
        {
            $session->visit($this->base.'/blog/article/'.$post->getSlug());
            
            $this->assertEquals($session->getStatusCode(), 200);            
            $this->assertEquals($session->getPage()->find('css','.main h2')->getText(),$post->getTitle());
            $this->assertTrue($session->getPage()->has('css','#disqus_thread'));
        }        
    }
    
    private function getPosts()
    {
        return $this->getDoctrine()->getRepository('rskaoz4Bundle:Post')->findActive();
    }    
}