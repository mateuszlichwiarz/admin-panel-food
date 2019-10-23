<?php

namespace App\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('password', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('sign-in', SubmitType::class, array('attr' => array('class' => 'btn btn-primary mt-3')))
            ;
    }
}