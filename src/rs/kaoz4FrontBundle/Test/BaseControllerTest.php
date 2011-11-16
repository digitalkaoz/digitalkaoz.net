<?php
 
namespace rs\kaoz4FrontBundle\Test;

use Behat\MinkBundle\Test\MinkTestCase;

class BaseControllerTest extends MinkTestCase
{
    protected $base;
//    protected $_application;
    
    protected function setUp()
    {
        $this->base = $this->getKernel()
            ->getContainer()
            ->getParameter('behat.mink.base_url');
/*        
        $this->_application = new \Symfony\Bundle\FrameworkBundle\Console\Application($this->getKernel());
        $this->_application->setAutoExit(false);        
        
        $this->runConsole("doctrine:schema:drop", array("--force" => true));
        $this->runConsole("doctrine:schema:create");
        $this->runConsole("cache:warmup");
        $this->runConsole("doctrine:fixtures:load");    
 * 
 */
    }
    
    protected function getDoctrine()
    {
        return $this->getKernel()->getContainer()->get('doctrine');
    }

/*    
    protected function runConsole($command, Array $options = array())
    {
        $options["-e"] = "test";
#        $options["-q"] = null;
        $options = array_merge($options, array('command' => $command));
        return $this->_application->run(new \Symfony\Component\Console\Input\ArrayInput($options));
    }
  */  
}
