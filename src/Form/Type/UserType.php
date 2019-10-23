<?php

namespace App\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\TextType;
use Symfony\Component\Form\Extension\Core\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $buider, array $options)
    {
        $builder
            ->add('login', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('password', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('submit', SubmitType::class, array('attr' => array('class' => 'btn btn-primary mt-3')))
            ;
    }
}