<?php

namespace App\Form;

use App\Entity\Actor;
use App\Entity\Program;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProgramType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('actors', EntityType::class, [
                'label' => 'Actors',
                'class' => Actor::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'mapped' => true,
                'by_reference' => false,
            ])
            ->add('title', TextType::class, ['label' => 'Title', 'required' => false])
            ->add('summary', TextType::class, ['label' => 'Summary', 'required' => false])
            ->add('poster', TextType::class, [
                'label' => 'Poster',
                'required' => false,
                // Add other file upload options as needed
            ])
            ->add('Category', null, ['label' => 'Category', 'choice_label' => 'name']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Program::class,
        ]);
    }
}
