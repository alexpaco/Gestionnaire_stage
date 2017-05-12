<?php

namespace NO\GestionnaireBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProjetType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomProjet', TextType::class)
                ->add('dateDebut', DateType::class, array(
                    'format' => 'ddMMyyyy',
                    'placeholder' => array(
                        'year' => 'Année', 'month' => 'mois', 'day' => 'jour'
                    )
                ))
                ->add('dateFin', DateType::class, array(
                    'format' => 'ddMMyyyy',
                    'placeholder' => array(
                        'year' => 'Année', 'month' => 'mois', 'day' => 'jour'
                    )
                ))
                ->add('users', EntityType::class, array(
                    'class' => 'NOGestionnaireBundle:User',
                    'choice_label' => 'nomUser',
                    'multiple' => true,
                    'expanded' => true,
                ))
                ->add('clients', EntityType::class, array(
                    'class' => 'NOGestionnaireBundle:Client',
                    'placeholder' => 'Choisi un client',
                    'choice_label' => 'nomClient',
                ))
                ->add('poles', EntityType::class, array(
                    'class' => 'NOGestionnaireBundle:Pole',
                    'placeholder' => 'Choisi un pole',
                    'choice_label' => 'nomPole',
                ))
                ->add('typologies', EntityType::class, array(
                    'class' => 'NOGestionnaireBundle:Typologie',
                    'placeholder' => 'Choisi une typologie',
                    'choice_label' => 'nomTypologie',
                ))
                ->add('Ajouter', SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'NO\GestionnaireBundle\Entity\Projet'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'no_gestionnairebundle_projet';
    }


}
