<?php
/**
 * Created by PhpStorm.
 * User: caziel
 * Date: 25.10.13
 * Time: 15:10
 */

namespace kaoz5\CmfBundle\Twig;


use ArrayIterator;
use Knp\Menu\ItemInterface;
use Knp\Menu\Iterator\CurrentItemFilterIterator;
use Knp\Menu\Iterator\RecursiveItemIterator;

class MenuTwigExtension extends \Twig_Extension
{
    /**
     * Get Twig functions defined in this extension.
     *
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'admin_menu_current'  => new \Twig_Function_Method($this, 'getCurrentMenuItem'),
            'admin_menu_top'  => new \Twig_Function_Method($this, 'getTopMenuItem'),
        );
    }

    /**
     * Returns the current ItemMenu from given Menu
     * @param ItemInterface $menu
     *
     * @return ItemInterface
     */
    public function getCurrentMenuItem(ItemInterface $menu)
    {
        $treeIterator = new \RecursiveIteratorIterator(
            new \Knp\Menu\Iterator\RecursiveItemIterator(
                new \ArrayIterator(array($menu))
            ),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        $iterator = new \Knp\Menu\Iterator\CurrentItemFilterIterator($treeIterator);

        $array = array();
        foreach ($iterator as $item) {
            $array[] = $item;
        }

        if (!empty($array)) {
            return $array[0];
        }

        return null;
    }

    /**
     * Returns the top MenuItem from given Menu
     *
     * @param ItemInterface $menu
     *
     * @return ItemInterface
     */
    public function getTopMenuItem(ItemInterface $menu)
    {
        return $this->getCurrentMenuItem($menu);
    }

    /**
     * Get the Twig extension name.
     *
     * @return string
     */
    public function getName()
    {
        return 'adminmenu_twig_extension';
    }
}