<?php

namespace ChambreBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChambreForm extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('numChambre')->add('telephoneChambre')->add('etage')->add('nombreLit')->add('description')
            ->add('category',EntityType::class,
                array(
                'class'=> 'ChambreBundle\Entity\Category',
                'choice_label' => 'libelle',
                'expanded' => false,
                'multiple' => false));

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ChambreBundle\Entity\Chambre'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'chambrebundle_chambre';
    }


}
