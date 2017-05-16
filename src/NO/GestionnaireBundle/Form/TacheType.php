<?php

namespace NO\GestionnaireBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TacheType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomTache', TextType::class)
                ->add('niveau', NumberType::class)
                ->add('Ajouter', SubmitType::class)
                ->add('ordre', NumberType::class, array(
                    'required' => false,
                ))
                ->add('joursRealises', NumberType::class, array(
                    'scale' => 1,
                    'required' => false,
                ))
                ->add('raf', NumberType::class, array(
                    'scale' => 1,
                    'required' => false,
                ))
                
                ->add('tacheMeres', EntityType::class, array(
                    'class' => 'NOGestionnaireBundle:Tache',
                    'choice_label' => 'nomTache',
                    'placeholder' => 'Choisi une tâche mère',
                    'required' => false,
                ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'NO\GestionnaireBundle\Entity\Tache'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'no_gestionnairebundle_tache';
    }


}
