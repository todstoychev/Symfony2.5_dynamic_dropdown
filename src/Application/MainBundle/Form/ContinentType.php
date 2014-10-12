<?php

namespace Application\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContinentType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('continent', 'entity', [
                    'label' => 'Continent: ',
                    'class' => 'Application\MainBundle\Entity\Continent',
                    'property' => 'continent',
                    'empty_value' => 'Select...'
                ])
                ->add('country')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Application\MainBundle\Entity\Country'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'application_mainbundle_country';
    }

}
