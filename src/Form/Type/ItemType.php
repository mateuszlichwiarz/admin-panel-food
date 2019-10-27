<?php

    namespace App\Form\Type;

    use App\Entity\Food;
    use Symfony\Component\OptionsResolver\OptionsResolver;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\FormBuilderInterface;

    class ItemType extends AbstractType 
    {
        public function buidForm(FormBuilderInterface $builder, array $options)
        {
            $builder
                ->add('name',        textType::class,     array('attr' => array('class' => 'form-control')))
                ->add('type',        textType::class,     array('attr' => array('class' => 'form-control')))
                ->add('description', textareaType::class, array('attr' => array('class'=>'form-control')))
                ->add('save',        SubmitType::class,   array(
                    'label' => 'save', 
                    'attr' => array('class' => 'btn btn-primary mt-3')
                ))
            ;
        }

        public function configureOptions(OptionsResolver $resolver)
        {
            $resolver->setDefaults([
                'data_class' => Food::class,
            ]);
        }
    }