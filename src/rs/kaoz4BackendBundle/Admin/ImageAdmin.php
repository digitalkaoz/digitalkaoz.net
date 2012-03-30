<?php

namespace rs\kaoz4BackendBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ImageAdmin extends Admin
{
    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('image')
            ->add('imageName')
        ;
    }

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
                ->add('image', 'file',array(),array('template'=>'rskaoz4BackendBundle:Admin:edit_uploadable.html.twig'))
                ->add('imageName')
            ->end()
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('image','string',array('template'=>'rskaoz4BackendBundle:Admin:list_image.html.twig'))
            ->add('imageName')                
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('imageName')
        ;
    }
}
