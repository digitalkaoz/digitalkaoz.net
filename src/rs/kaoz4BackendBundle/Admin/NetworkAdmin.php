<?php

namespace rs\kaoz4BackendBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class NetworkAdmin extends Admin
{
    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('active')
            ->add('name')
            ->add('url')
            ->add('logo')
            ->add('description')
        ;
    }

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
                ->add('name')
                ->add('url')
                ->add('logo')
                ->add('description')
                ->add('active', null, array('required' => false))
                //->add('author', 'sonata_type_model', array(), array('edit' => 'list'))
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
            ->add('active')
            ->addIdentifier('name')
            ->add('url')
            ->add('logo')
            ->add('description')
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('active')
            ->add('name')
            //->add('tags', null, array('filter_field_options' => array('expanded' => true, 'multiple' => true)))
        ;
    }
}
