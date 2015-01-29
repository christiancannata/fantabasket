<?php

namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CompetizioneType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('timestamp')
            ->add('lastUpdateTimestamp')
            ->add('tipo')
            ->add('statoAttuale')
            ->add('descrizione')
            ->add('maxPartecipanti')
            ->add('avatar')
            ->add('modalitaMercato')
            ->add('utente')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\DemoBundle\Entity\Competizione'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_demobundle_competizione';
    }
}
