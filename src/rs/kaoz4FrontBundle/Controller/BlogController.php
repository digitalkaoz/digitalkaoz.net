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
        
        return array('posts' => $posts);
    }
    
    /**
     * @Route("/blog/article/{slug}", name="post")
     * @Template("rskaoz4FrontBundle:Blog:post.html.twig")
     */
    public function detailAction($slug)
    {
        $post = $this->getRepository('Post')->findOneBySlug($slug);
                
        return array('post' => $post );
    }
    
    /**
     * get the entity manager
     * 
     * @return EntityRepository
     */
    private function getRepository($entity)
    {
        return $this->getDoctrine()->getRepository('rskaoz4FrontBundle:'.$entity);
    }
}