<?php

namespace NO\GestionnaireBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomUser', TextType::class)
                ->add('password', PasswordType::class)
                ->add('poles', EntityType::class, array(
                    'class' => 'NOGestionnaireBundle:Pole',
                    'placeholder' => 'Choisi un pole',
                    'choice_label' => 'nomPole',
                    'multiple' => false,
                ))
                ->add('roles', EntityType::class, array(
                    'class' => 'NOGestionnaireBundle:Role',
                    'placeholder' => 'Choisi un role',
                    'choice_label' => 'nomRole',
                    'multiple' => true,
                ))
                ->add('Ajouter', SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'NO\GestionnaireBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'no_gestionnairebundle_user';
    }


}
