<?php

namespace rs\kaoz4FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Doctrine\ORM\EntityRepository;

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
     * @Route("/bio", name="bio")
     * @Template("rskaoz4FrontBundle:Home:bio.html.twig")
     */
    public function bioAction()
    {
        $repo = $this->getRepository('Bio');
        $hobbys = $repo->findByCategory('Hobbys');
        $languages = $repo->findByCategory('Languages');
        $frameworks = $repo->findByCategory('Frameworks');
        $works = $repo->findByCategory('Work');
        $educations = $repo->findByCategory('Education');        
        
        return array(
            'hobbys' => $hobbys,
            'languages' => $languages,
            'frameworks' => $frameworks,
            'works' => $works,
            'educations' => $educations
        );
    }
    
    /**
     * @Route("/contact", name="contact")
     * @Template("rskaoz4FrontBundle:Home:contact.html.twig")
     */
    public function contactAction()
    {
        if('POST' == $this->getRequest()->getMethod())
        {            
            //return $this->redirect($this->getRequest()->getUri());
        }
        
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
     * @return EntityRepository
     */
    private function getRepository($entity)
    {
        return $this->getDoctrine()->getRepository('rskaoz4Bundle:'.$entity);
    }
}
