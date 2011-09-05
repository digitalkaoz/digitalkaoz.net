<?php

namespace rs\kaoz4FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
    
    /**
     * @Route("/blog", name="blog")
     * @Template("rskaoz4FrontBundle:Home:index.html.twig")
     */
    public function blogAction()
    {
        return array();
    }
    
    /**
     * @Route("/projects", name="projects")
     * @Template("rskaoz4FrontBundle:Home:index.html.twig")
     */
    public function projectsAction()
    {
        return array();
    }
    
    /**
     * @Route("/bio", name="bio")
     * @Template("rskaoz4FrontBundle:Home:index.html.twig")
     */
    public function bioAction()
    {
        return array();
    }
    
    /**
     * @Route("/networks", name="networks")
     * @Template("rskaoz4FrontBundle:Home:networks.html.twig")
     */
    public function networksAction()
    {
        $networks = $this->getRepository('Network')->findActive();
        
        return array('networks' => $networks);
    }        
    
    /**
     * @Route("/_footer")
     * @Method("GET")
     * @Cache(smaxage="1200")
     * @Template()
     */
    public function footerAction()
    {
        return array(); 
    }

    /**
     * @Route("/_header")
     * @Method("GET")
     * @Cache(smaxage="1200")
     * @Template()
     */
    public function headerAction()
    {
        return array(); 
    }
    
    /**
     * @Route("/_mainnav")
     * @Method("GET")
     * @Cache(smaxage="60")
     * @Template()
     */
    public function mainNavigationAction()
    {
        return array(); 
    }
    
    
    /**
     * get the entity manager
     * 
     * @return mixed
     */
    private function getRepository($entity)
    {
        return $this->getDoctrine()->getRepository('rskaoz4FrontBundle:'.$entity);
    }
}
