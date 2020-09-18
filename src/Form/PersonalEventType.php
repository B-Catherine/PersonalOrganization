<?php

namespace App\Form;

use App\Entity\PersonalEvent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Form\DataTransformer\UserToNumberTransformer;

class PersonalEventType extends AbstractType
{   
    private $transformer;

    public function __construct(UserToNumberTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('beginAt')
            ->add('endAt')
            ->add('title')
            ->add('comment')
            ->add('users')
        ;

        $builder->get('users')
            ->addModelTransformer($this->transformer);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PersonalEvent::class,
        ]);
    }
}
