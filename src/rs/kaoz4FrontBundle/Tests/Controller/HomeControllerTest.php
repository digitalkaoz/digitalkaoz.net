<?php

namespace rs\kaoz4FrontBundle\Tests\Controller;

use Behat\MinkBundle\Test\MinkTestCase;

class HomeControllerTest extends MinkTestCase
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
        $session->visit($this->base.'/');
        
        $this->assertEquals($session->getStatusCode(),200);
        $this->assertTrue($session->getPage()->hasContent('Blog'));
    }

    public function testBio()
    {
        $session = $this->getSession('symfony');
        $session->visit($this->base.'/bio');
        
        $this->assertEquals($session->getStatusCode(),200);
        $this->assertEquals($session->getPage()->find('css','h2')->getText(),'Bio');

        $hs = $session->getPage()->findAll('css','h3');
        $categorys = array();
        
        foreach($hs as $h)
        {
            $categorys[] = $h->getText();
        }
        
        foreach($this->getBios() as $bio)
        {
            $this->assertTrue($session->getPage()->hasContent($bio->getName()));
            
            $this->assertContains($bio->getCategory(),$categorys);
        }        
    }
    
    public function testContact()
    {
        $session = $this->getSession('symfony');
        $session->visit($this->base.'/contact');
        
        $this->assertEquals($session->getStatusCode(),200);
        $this->assertEquals($session->getPage()->find('css','h2')->getText(),'Contact');
        
        $session->getPage()->fillField('ihqs_contact_contact_form[senderName]','foo');
        $session->getPage()->fillField('ihqs_contact_contact_form[subject]','foo');
        $session->getPage()->fillField('ihqs_contact_contact_form[message]','bar');
        
        $session->getPage()->findButton('Submit contact form')->click();
        
        $this->assertEquals($session->getStatusCode(),200);        
        $this->assertTrue($session->getPage()->has('css','div.alert-message.error'));
        
        $session->getPage()->fillField('ihqs_contact_contact_form[senderEmail]','foo@bar.de');
        $session->getPage()->findButton('Submit contact form')->click();
        
        $this->assertEquals($session->getStatusCode(),200);        
        $this->assertTrue($session->getPage()->has('css','div.alert-message.success'));
    }

    private function getBios()
    {
        return $this->getKernel()->getContainer()->get('doctrine')->getRepository('rskaoz4Bundle:Bio')->findActive();
    }    
}
