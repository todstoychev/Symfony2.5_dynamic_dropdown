<?php

namespace Application\MainBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CountryType extends ContinentType {

    private $continent_id;

    public function __construct($continent_id) {
        $this->continent_id = $continent_id;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        parent::buildForm($builder, $options);

        $builder
                ->add('country', 'entity', [
                    'label' => 'Country: ',
                    'class' => 'Application\MainBundle\Entity\Country',
                    'property' => 'country',
                    'query_builder' => function (\Doctrine\ORM\EntityRepository $er) {
                        return $er->createQueryBuilder('country')
                                ->where('country.continent =' . $this->continent_id);
                    }
                ])
        ;
                
    }

    

}
