<?php

namespace rs\kaoz4BackendBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class BioAdmin extends Admin
{
    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('active')
            ->add('name')
            ->add('category')
            ->add('level')
            ->add('url')
            ->add('period')
        ;
    }

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
                ->add('active', null, array('required' => false))
                ->add('name')
                ->add('category')
                ->add('level')
                ->add('url')
                ->add('period')
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
            ->addIdentifier('name')
            //->add('author')
            ->add('active')
            ->add('category')
            ->add('level')
            ->add('url')
            ->add('period')
            //->add('tags')
            //->add('commentsEnabled')
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('category')
            ->add('active')
            //->add('tags', null, array('filter_field_options' => array('expanded' => true, 'multiple' => true)))
        ;
    }
}
