<?php

namespace rs\kaoz4FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Doctrine\ORM\EntityRepository;

/**
 * @Route("/blog")
 */
class BlogController extends Controller
{
    /**
     * @Route("/", name="blog")
     * @Template("rskaoz4FrontBundle:Blog:index.html.twig")
     */
    public function indexAction()
    {
        $posts = $this->getRepository('Post')->findActive();
        
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $this->getRepository('Post')->createIsActiveQueryBuilder()->getQuery(),
            $this->get('request')->query->get('page', 1),
            10
        );
        
        return array('paginator' => $pagination);
    }
    
    /**
     * @Route("/article/{slug}", name="post")
     * @Template("rskaoz4FrontBundle:Blog:post.html.twig")
     */
    public function detailAction($slug)
    {
        $post = $this->getRepository('Post')->findOneBySlug($slug);
                
        return array('post' => $post );
    }
    
    /**
     * @Route("/_latest_post", name="latest_post")
     * @Template("rskaoz4FrontBundle:Blog:latest.html.twig")
     */
    public function latestAction()
    {
        $post = $this->getRepository('Post')->findLatest();
                
        return array('post' => $post );
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
