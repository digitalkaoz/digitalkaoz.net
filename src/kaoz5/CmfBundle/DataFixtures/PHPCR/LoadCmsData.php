<?php

namespace kaoz5\CmfBundle\DataFixtures\PHPCR;

use Symfony\Component\Yaml\Parser;

use Symfony\Cmf\Bundle\SimpleCmsBundle\DataFixtures\Phpcr\AbstractLoadPageData;

class LoadCmsData extends AbstractLoadPageData
{
    private $yaml;

    public function getOrder()
    {
        return 5;
    }

    protected function getData()
    {
        $this->yaml = new Parser();

        return $this->yaml->parse(file_get_contents(__DIR__.'/../../Resources/data/page.yml'));
    }

//    public function load(ObjectManager $dm)
//    {
//        $this->yaml = new Parser();
//
//        parent::load($dm);
//
//        $data = $this->yaml->parse(file_get_contents(__DIR__ . '/../../Resources/data/external.yml'));
//
//        $basepath = $this->getBasePath();
//        $home = $dm->find(null, $basepath);
//
//        $route = new MultilangRoute();
//        $route->setPosition($home, 'dynamic');
//        $route->setDefault('_controller', 'AcmeMainBundle:Demo:dynamic');
//
//        $dm->persist($route);
//
//        foreach ($data['static'] as $name => $overview) {
//            $menuItem = new MenuNode();
//            $menuItem->setName($name);
//            $menuItem->setParent($home);
//            if (!empty($overview['route'])) {
//                if (!empty($overview['uri'])) {
//                    $route = new MultilangRedirectRoute();
//                    $route->setPosition($home, $overview['route']);
//                    $route->setUri($overview['uri']);
//                    $dm->persist($route);
//                } else {
//                    $route = $dm->find(null, $basepath.'/'.$overview['route']);
//                }
//                $menuItem->setRoute($route->getId());
//            } else {
//                $menuItem->setUri($overview['uri']);
//            }
//
//            $dm->persist($menuItem);
//            foreach ($overview['label'] as $locale => $label) {
//                $menuItem->setLabel($label);
//                if ($locale) {
//                    $dm->bindTranslation($menuItem, $locale);
//                }
//            }
//        }
//
//        $dm->flush();
//    }
}