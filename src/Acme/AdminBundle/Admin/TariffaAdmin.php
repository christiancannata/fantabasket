<?php

namespace Facile\Adsl\AdminBundle\Admin;

use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Facile\Adsl\WsBundle\Entity\Tariffa;
use Facile\Adsl\AdminBundle\Entity\UploadableEntityInterface;

class TariffaAdmin extends Admin
{

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('clone', $this->getRouterIdParameter() . '/clone');
    }

    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nome')
            ->add('compagnia', 'entity', array('class' => 'Facile\Adsl\WsBundle\Entity\Compagnia'))
            ->add('tecnologia', 'choice', array('choices' => array('ADSL' => 'ADSL', 'FIBER' => 'FIBER', 'WIRELESS' => 'WIRELESS'), 'label' => 'tecnologia'))
            ->add('validoDa')
            ->add('validoFinoA')
            ->add('isActive', 'choice', array('choices' => array(true => 'Si', false => 'No'), 'label' => 'Attiva'))
            ->add('isActiveFrontend', 'choice', array('choices' => array(true => 'Si', false => 'No'), 'label' => 'Attiva su Frontend'))
            ->add('isActiveBunny', 'choice', array('choices' => array(true => 'Si', false => 'No'), 'label' => 'Attiva su Bunny'))
            ->add('canone', 'number', array('precision' => 2))
            ->add('vincolo', 'number')
            ->add('chiamateFissi', 'choice', array('choices' => array('NONE' => 'NONE', 'FLAT' => 'FLAT', 'CONSUMO' => 'CONSUMO')))
            ->add('chiamateCellulari', 'choice', array('choices' => array('NONE' => 'NONE', 'FLAT' => 'FLAT', 'CONSUMO' => 'CONSUMO')))
            ->add('costoAttivazioneNuovaLinea', 'number', array('precision' => 2))
            ->add('costoAttivazioneServizio', 'number', array('precision' => 2))
            ->add('costoAttivazioneUnaTantum', 'number', array('precision' => 2))
            ->add('dataInizioPromozione')
            ->add('dataScadenzaPromozione')
            ->add('canonePromozione', 'number', array('precision' => 2))
            ->add('durataPromozione', 'number')
            ->add('speseRescissioneContratto')
            ->add('tariffazioneUsoEffettivo', 'choice', array('choices' => array(true => 'Si', false => 'No'), 'required' => false))
            ->add('necessitaDistaccoTelecom', 'choice', array('choices' => array(true => 'Si', false => 'No'), 'required' => false))
            ->add('canoneTelecom', 'choice', array('choices' => array(true => 'Si', false => 'No'), 'required' => false))
            ->add('testoRibbon')
            ->add('modemWifi')
            ->add('costoMensileModem', 'number', array('precision' => 2))
            ->add('durataCostoModem', 'number')
            ->add('commenti', 'textarea')
            ->add('loSapeviChe')
            ->add('claimSottoLogo')
            ->add('url', null, array('label' => 'Tracking URL'))
            ->end()
            ->with('Costi Chiamate')
            ->add('scattoFissi', 'number', array('precision' => 2))
            ->add('costoChiamataLocaliFissi', 'number', array('precision' => 2))
            ->add('costoChiamataNazionaliFissi', 'number', array('precision' => 2))
            ->add('scattoCellulari', 'number', array('precision' => 2))
            ->add('costoChiamataLocaliCellulari', 'number', array('precision' => 2))
            ->with('Documenti')
            ->add('documenti', 'sonata_type_collection', array(
                'required' => false,
            ), array(
                'edit' => 'inline',
                'inline' => 'table',
            ), array(
            ))
            ->end();
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     *
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('timestamp')
            ->add('lastUpdateTimestamp')
            ->add('compagnia')
            ->add('nome')
            ->add('validoDa')
            ->add('validoFinoA')
            ->add('isActive')
            ->add('isActiveFrontend')
            ->add('isActiveBunny')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                    'clone' => array(
                        'template' => 'FacileAdslAdminBundle:CRUD:list__action_clone.html.twig'
                    )
                )
            ));
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nome', null, array('global_search' => true))
            ->add('compagnia')
            ->add('validoDa')
            ->add('validoFinoA')
            ->add('isActive');

    }


    private function manageEmbeddedAdmins($page, $event = 'upload') {
        $container = $this->getConfigurationPool()->getContainer();
        // Cycle through each field
        foreach ($this->getFormFieldDescriptions() as $fieldName => $fieldDescription) {
            // detect embedded Admins that manage Images
            if (
                ($fieldDescription->getType() == 'sonata_type_admin' || $fieldDescription->getType() == 'sonata_type_collection') &&
                $associationMapping = $fieldDescription->getAssociationMapping()
            ) {
                if ($object = $page->{'get' . $fieldName}()) {
                    if ($fieldDescription->getType() === 'sonata_type_collection') {
                        foreach ($object as $entity) {
                            if ($entity instanceof UploadableEntityInterface) {
                                $entity->setUploadRootDir($container->getParameter('upload_dir'));
                                if ($event == 'upload') {
                                    $entity->upload();
                                } else {
                                    $entity->remove();
                                }
                            } else {
                                break;
                            }
                        }
                    } else {
                        if ($entity instanceof UploadableEntityInterface) {
                            $entity->setUploadRootDir($container->getParameter('upload_dir'));
                            if ($event == 'upload') {
                                $entity->upload();
                            } else {
                                $entity->remove();
                            }
                        }
                    }
                }
            }
        }
    }
}