<?php

namespace ColinFrei\BitFieldTypeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use ColinFrei\BitFieldTypeBundle\Form\DataTransformer\BitfieldToArrayTransformer;

class BitfieldType extends AbstractType
{
    public function getDefaultOptions(array $options)
    {
        return array(
            'expanded' => true,
            'multiple' => true,
        );
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer(new BitfieldToArrayTransformer());
    }

    public function getParent()
    {
        return new ChoiceType();
    }

    public function getName()
    {
        return 'bitfield';
    }
}