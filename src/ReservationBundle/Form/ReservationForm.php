<?php

namespace ReservationBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationForm extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('adulte_number')->add('childen_number')->add('dateStart', DateType::class,
            ['widget' => 'single_text',
    "years"=>["2020","2021","2022","2023","2024"]])->add('dateEnd', DateType::class,
            ['widget' =>'single_text',
                "years"=>["2020","2021","2022","2023","2024"]])->add('hosting',EntityType::class,
            array(
                'class'=> 'ReservationBundle\Entity\Hosting',
                'choice_label' => 'label',
                'expanded' => false,
                'multiple' => false));
//            ->add('chambres',EntityType::class,
//                array('class'=> 'ChambreBundle\Entity\Chambre',
//                    'choice_label' => 'description',
//                    'expanded' => false,
//                    'multiple' => true));;
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ReservationBundle\Entity\Reservation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'reservationbundle_reservation';
    }


}
