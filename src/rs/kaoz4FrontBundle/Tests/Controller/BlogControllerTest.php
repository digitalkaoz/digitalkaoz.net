<?php

namespace rs\kaoz4FrontBundle\Tests;

use Behat\MinkBundle\Test\MinkTestCase;

class BlogControllerTest extends MinkTestCase
{
    protected $base;

    protected function setUp()
    {
        $this->base = $this->getKernel()
            ->getContainer()
            ->getParameter('behat.mink.base_url');
    }

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
            $this->assertEquals($session->getPage()->find('css','h2')->getText(),$post->getTitle());
            $this->assertTrue($session->getPage()->has('css','#disqus_thread'));
        }        
    }
    
    private function getPosts()
    {
        return $this->getKernel()->getContainer()->get('doctrine')->getRepository('rskaoz4Bundle:Post')->findActive();
    }
}