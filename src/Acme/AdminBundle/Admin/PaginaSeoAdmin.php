<?php

namespace Facile\Adsl\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;

class PaginaSeoAdmin extends Admin {

    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields( FormMapper $formMapper ) {

        $formMapper
            ->add( 'nome' )
            ->add( 'permalink' )
            ->add( 'title' )
            ->add( 'metaDescription' )
            ->add( 'metaKey' )
            ->add( 'testoBox' )
            ->add( 'type', 'choice', array('choices' => array('INTERNET_VOCE' => 'Internet + Voce', 'INTERNET' => 'Solo internet')))
            ->add( 'tecnologia', 'choice', array('choices' => array('TUTTE' => 'TUTTE', 'ADSL' => 'ADSL', 'FIBER' => 'Fibra ottica', 'WIRELESS' => 'Wireless')))
            ->add( 'chiamateFissi', 'choice', array('choices' => array('NONE' => 'NONE', 'FLAT' => 'FLAT', 'CONSUMO' => 'CONSUMO')))
            ->add( 'chiamateCellulari', 'choice', array('choices' => array('NONE' => 'NONE', 'FLAT' => 'FLAT', 'CONSUMO' => 'CONSUMO')))
            ->add( 'velocita', 'choice', array('choices' => array('1' => '1', '7' => '7', '10' => '10', '20' => '20', '100' => '100')));
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     *
     * @return void
     */
    protected function configureListFields( ListMapper $listMapper ) {
        $listMapper
            ->addIdentifier( 'id' )
            ->add( 'nome' )
            ->add( 'permalink' )
            ->add( '_action', 'actions', array(
                'actions' => array(
                    'edit'   => array(),
                    'delete' => array(),
                )
            ) );
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @return void
     */
    protected function configureDatagridFilters( DatagridMapper $datagridMapper ) {

    }
    /*
        public function postPersist($object){
            $this->clearCache('/adsl/seo/'.$object->getPermalink());
        }
        public function postUpdate($object){
            $this->clearCache('/adsl/seo/'.$object->getPermalink());
        }
        public function postRemove($object){
            $this->clearCache('/adsl/seo/'.$object->getPermalink());
        }

        public function clearCache($object_key){
            $container = $this->getConfigurationPool()->getContainer();
            $memcache = $container->get('memcache');
            $memcache->delete($object_key);
        }*/
}
