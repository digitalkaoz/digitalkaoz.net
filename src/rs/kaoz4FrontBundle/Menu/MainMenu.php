<?php

namespace rs\kaoz4FrontBundle\Menu;

use Knp\Bundle\MenuBundle\Menu;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Router;

class MainMenu extends Menu
{
    /**
     * @param Request $request
     * @param Router $router
     */
    public function __construct(Request $request, Router $router)
    {
        parent::__construct();

        $this->setCurrentUri($request->getRequestUri());

        $this->addChild('Home', $router->generate('home'));
        $this->addChild('Blog', $router->generate('blog'));
        $this->addChild('Vita', $router->generate('vita'));
        $this->addChild('Stuff', $router->generate('stuff'));
        $this->addChild('Networks', $router->generate('networks'));
    }
}