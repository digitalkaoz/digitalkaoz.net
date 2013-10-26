<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2013 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace kaoz5\CmfBundle\Admin;

use Sonata\AdminBundle\Datagrid\ListMapper;
use Symfony\Cmf\Bundle\BlockBundle\Admin\Imagine\ImagineBlockAdmin as BaseAdmin;

/**
 * @author Horner
 */
class kaozImagineBlockAdmin extends BaseAdmin
{
    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('label', 'text')
            ->add('image', 'string', array('template' => 'kaoz5CmfBundle:Admin:list_image.html.twig'))
            ->add('linkUrl', 'text')
            ->add('filter', 'text');
    }
}
