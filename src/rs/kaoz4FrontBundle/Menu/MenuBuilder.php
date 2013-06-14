<?php

namespace rs\kaoz4FrontBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class MenuBuilder
{
    private $factory;

    /**
     * @param \Knp\Menu\FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root',array('attributes'=>array('class'=>'nav')));
        $menu->setCurrentUri($request->getRequestUri());

        $menu->addChild('Blog', array('route' => 'blog','attributes'=>array('class'=>'navitem blog span2')));
        $menu->addChild('Bio', array('route' => 'bio','attributes'=>array('class'=>'navitem blog span2')));
        $menu->addChild('Projects', array('route' => 'projects','attributes'=>array('class'=>'navitem blog span2')));
        $menu->addChild('References', array('route' => 'bio','attributes'=>array('class'=>'navitem blog span2')));

        return $menu;
    }
    
    public function createFooterMenu(Request $request)
    {
        $menu = $this->factory->createItem('root',array('attributes'=>array('class'=>'nav')));
        $menu->setCurrentUri($request->getRequestUri());

        $menu->addChild('Blog', array('route' => 'blog'));
        $menu->addChild('Bio', array('route' => 'bio'));
        $menu->addChild('Projects', array('route' => 'projects'));
        $menu->addChild('Contact', array('route' => 'contact'));

        return $menu;
    }
}