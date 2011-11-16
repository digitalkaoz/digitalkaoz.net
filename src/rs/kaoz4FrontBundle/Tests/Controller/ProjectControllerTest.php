<?php

namespace rs\kaoz4FrontBundle\Tests;

use rs\kaoz4FrontBundle\Test\BaseControllerTest;

class ProjectControllerTest extends BaseControllerTest
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
        $session->visit($this->base.'/projects');

        $this->assertEquals($session->getStatusCode(), 200);
        
        foreach($this->getProjects() as $project)
        {
            $this->assertTrue($session->getPage()->has('css', 'a[href="/projects/detail/'.$project->getSlug().'"]'));
        }        
    }
    
    public function testDetail()
    {
        $session = $this->getSession('symfony');

        foreach($this->getProjects() as $project)
        {
            $session->visit($this->base.'/projects/detail/'.$project->getSlug());
            
            $this->assertEquals($session->getStatusCode(), 200);            
            $this->assertEquals($session->getPage()->find('css','.main h2')->getText(),$project->getName());
            $this->assertTrue($session->getPage()->has('css','#disqus_thread'));
        }        
    }
    
    private function getProjects()
    {
        return $this->getKernel()->getContainer()->get('doctrine')->getRepository('rskaoz4Bundle:Project')->findActive();
    }
}