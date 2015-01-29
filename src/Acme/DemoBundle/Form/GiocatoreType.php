<?php

namespace Acme\DemoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GiocatoreType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
            ->add('cognome')
            ->add('prezzo')
            ->add('prezzoIniziale')
            ->add('altezza')
            ->add('peso')
            ->add('nazionalita')
            ->add('ruolo')
            ->add('avatar')
            ->add('squadraReale')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\DemoBundle\Entity\Giocatore'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'acme_demobundle_giocatore';
    }
}
