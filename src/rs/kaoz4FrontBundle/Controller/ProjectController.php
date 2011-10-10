<?php

namespace rs\kaoz4FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Doctrine\ORM\EntityRepository;

/**
 * @Route("/projects")
 */
class ProjectController extends Controller
{
    /**
     * @Route("/", name="projects")
     * @Template("rskaoz4FrontBundle:Projects:index.html.twig")
     */
    public function indexAction()
    {
        $projects = $this->getRepository('Project')->findActive();
        
        return array('projects' => $projects);
    }
    
    /**
     * @Route("/{slug}", name="project")
     * @Template("rskaoz4FrontBundle:Projects:project.html.twig")
     */
    public function detailAction($slug)
    {
        $project = $this->getRepository('Project')->findOneBySlug($slug);
                
        return array('project' => $project );
    }
    
    /**
     * @Route("/_latest_project", name="latest_project")
     * @Template("rskaoz4FrontBundle:Projects:latest.html.twig")
     */
    public function latestAction()
    {
        $project = $this->getRepository('Project')->findLatest();
                
        return array('project' => $project );
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
