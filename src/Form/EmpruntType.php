<?php

namespace App\Form;

use App\Entity\Emprunt;
use App\Entity\Objet;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpruntType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateDeDebut', null, [
                'widget' => 'single_text',
            ])
            ->add('dateDeFin', null, [
                'widget' => 'single_text',
            ])
            ->add('utilisateur', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])
            ->add('objet', EntityType::class, [
                'class' => Objet::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Emprunt::class,
        ]);
    }
}
