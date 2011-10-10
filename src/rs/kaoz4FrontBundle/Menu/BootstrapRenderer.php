<?php

namespace rs\kaoz4FrontBundle\Menu;

use Knp\Menu\Renderer\ListRenderer;
/**
 * Description of BootstrapRenderer
 *
 * @author caziel
 */
class BootstrapRenderer extends ListRenderer
{
    protected function getDefaultOptions()
    {
        $options = parent::getDefaultOptions();
        
        $options['currentClass'] = 'active';
        
        return $options;
    }    
}

