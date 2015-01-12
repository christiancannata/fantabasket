<?php

namespace Facile\Adsl\AdminBundle\Admin;

use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Facile\Adsl\WsBundle\Entity\Compagnia;

class AnagraficaLeadAdmin extends Admin {

    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('nome')
                ->add('cognome')
                ->add('telefono')
                ->add('email')
                ->add('sorgente', 'entity', array('class' => 'Facile\Adsl\WsBundle\Entity\Sorgente'))
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     *
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('id')
                ->add('nome')
                ->add('cognome')
                ->add('timestamp')
                ->add('telefono')
                ->add('email')
                ->add('sorgente.nome', 'entity', array('class' => 'Facile\Adsl\WsBundle\Entity\Sorgente'))
                ->add('_action', 'actions', array(
                    'actions' => array(
                        'edit' => array(),
                        'delete' => array(),
                    )
        ));
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('id', null, array('global_search' => true))
                ->add('nome', null, array('global_search' => true))
                ->add('cognome', null, array('global_search' => true))
                ->add('telefono', null, array('global_search' => true))
                ->add('email', null, array('global_search' => true))
        ;
    }
}