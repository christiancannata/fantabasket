<?php

namespace Facile\Adsl\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Facile\Adsl\WsBundle\Entity\Documento;
use Facile\Adsl\AdminBundle\Entity\UploadableEntityInterface;

class DocumentoAdmin extends Admin {

    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('fileName')
                ->add('file', 'file')
                ->add('tipo', 'choice', array("choices" => array("CONDIZIONI_GENERALI" => "CONDIZIONI_GENERALI", "PROSPETTO_INFORMATIVO" => "PROSPETTO_INFORMATIVO", "BOLLETTA_CLIENTE" => "BOLLETTA_CLIENTE", "DETTAGLI_SCONTO" => "DETTAGLI_SCONTO"),
                ))
                ->add('soloBunny')
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
                ->add('timestamp')
                ->add('lastUpdateTimestamp')
                ->add('fileName')
                ->add('filePath')
                ->add('soloBunny')
                ->add('_action', 'actions', array(
                        'actions' => array(
                            'edit' => array(),
                            'delete' => array(),
                        )
                    ))
        ;
    }

    public function prePersist($object) {
        if ($object instanceof UploadableEntityInterface) {
            $object->setUploadRootDir($this->getConfigurationPool()->getContainer()->getParameter('upload_dir'));
            $object->upload();
        }
    }

    public function preUpdate($object) {
        if ($object instanceof UploadableEntityInterface) {
            $object->setUploadRootDir($this->getConfigurationPool()->getContainer()->getParameter('upload_dir'));
            $object->upload();
        }
    }

    public function preRemove($object) {
        if ($object instanceof UploadableEntityInterface) {
            $object->setUploadRootDir($this->getConfigurationPool()->getContainer()->getParameter('upload_dir'));
            $object->remove();
        }
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     *
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        
    }
}
