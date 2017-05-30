<?php

namespace NO\GestionnaireBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class TacheEditType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->remove('nomTache')
                ->remove('niveau')
                ->remove('ordre')                
                ->remove('tacheMeres')
                ->remove('Ajouter')
                ->add('joursRealises', NumberType::class, array(
                    'required' => false
                ))
                ->add('RAF', NumberType::class, array(
                    'required' => false
                ))
                ->add('Modifier', SubmitType::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'no_gestionnairebundle_tache_edit';
    }
    public function getParent()
    {
        return TacheType::class;

    }


}
