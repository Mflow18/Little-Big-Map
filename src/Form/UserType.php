<?php

namespace App\Form;

use App\Entity\Age;
use App\Entity\Category;
use App\Entity\Children;
use App\Entity\Family;
use App\Entity\Iris;
use App\Entity\Profession;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class)
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options' => ['label' => 'Password'],
                'second_options' => ['label' => 'Repeat Password'],
            ])
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
            ->add('picture', TextType::class)
            ->add('professions', EntityType::class,
                [
                    'class' => Profession::class,
                    'choice_label' => 'name',
                    'expanded' => true,
                    'multiple' => true,
                    'by_reference' => false,
                ])
            ->add('age', EntityType::class,
                [
                    'class' => Age::class,
                    'choice_label' => 'ageRange',
                    'expanded' => true,
                    'by_reference' => false,
                ]
            )
            ->add('children', EntityType::class,
                [
                    'class' => Children::class,
                    'choice_label' => 'number',
                    'expanded' => true,
                    'by_reference' => false,
                ])
            ->add('categories', EntityType::class,
                [
                    'class' => Category::class,
                    'choice_label' => 'name',
                    'expanded' => true,
                    'multiple' => true,
                    'by_reference' => false,
                ]
            )
            ->add('family', EntityType::class,
                [
                    'class' => Family::class,
                    'choice_label' => 'state',
                    'expanded' => true,
                    'by_reference' => false,
                ]
            )
            ->add('irises', EntityType::class,
                [
                    'class' => Iris::class,
                    'choice_label' => 'name',
                    'expanded' => true,
                    'multiple' => true,
                    'by_reference' => false,
                ])
            ->add('save', SubmitType::class, ['label' => 'Créer mon compte']);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
