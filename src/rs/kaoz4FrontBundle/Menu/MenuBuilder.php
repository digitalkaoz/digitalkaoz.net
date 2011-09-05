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
        $menu = $this->factory->createItem('root');
        $menu->setCurrentUri($request->getRequestUri());

        $menu->addChild('Home', array('route' => 'home'));
        $menu->addChild('Blog', array('route' => 'blog'));
        $menu->addChild('Bio', array('route' => 'bio'));
        $menu->addChild('Projects', array('route' => 'projects'));
        $menu->addChild('Networks', array('route' => 'networks'));

        return $menu;
    }
}