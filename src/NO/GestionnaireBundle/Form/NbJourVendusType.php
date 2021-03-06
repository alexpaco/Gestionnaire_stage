<?php

namespace NO\GestionnaireBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use NO\GestionnaireBundle\Repository\TacheRepository;

class NbJourVendusType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('joursVendus', NumberType::class, array(
                    'required' => false,
                ))
                ->add('tache', EntityType::class, array(
                    'class' => 'NOGestionnaireBundle:Tache',
                    'choice_label' => 'nomTache',
                    'placeholder' => 'Choisi une tâche',
                    'query_builder' => function(TacheRepository $repository)
                    {
                        return $repository->afficheTachesEnfant();
                    }
                ))
                ->add('profil', EntityType::class, array(
                    'class' => 'NOGestionnaireBundle:Profil',
                    'choice_label' => 'nomProfil',
                    'placeholder' => 'Choisi un profil',
                ))
                ->add('modifier', SubmitType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'NO\GestionnaireBundle\Entity\NbJourVendus'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'no_gestionnairebundle_nbjourvendus';
    }


}
