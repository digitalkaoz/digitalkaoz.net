<?php

namespace rs\kaoz4BackendBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PostAdmin extends Admin
{
    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('active')
            ->add('title')
            ->add('logo')
            ->add('abstract')
            ->add('text')
        ;
    }

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
                ->add('active', null, array('required' => false))
                //->add('author', 'sonata_type_model', array(), array('edit' => 'list'))
                ->add('title')
                ->add('abstract')
                ->add('text')
            ->end()
            ->with('Images')
                ->add('images','sonata_type_model',array(),array('edit' => 'inline',
                'inline' => 'table',))
            ->end()
/*            ->with('Tags')
                ->add('tags', 'sonata_type_model', array('expanded' => true))
            ->end()
            ->with('Options', array('collapsed' => true))
                ->add('commentsCloseAt')
                ->add('commentsEnabled', null, array('required' => false))
            ->end()*/
        ;
    }
    
    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            //->add('author')
            ->add('active')
            ->add('abstract')
            //->add('tags')
            //->add('commentsEnabled')
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('active')
            //->add('tags', null, array('filter_field_options' => array('expanded' => true, 'multiple' => true)))
        ;
    }
}
