<?php

namespace ColinFrei\BitFieldTypeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

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

    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->prependClientTransformer(new BitfieldToArrayTransformer());
    }

    public function getParent(array $options)
    {
        return 'choice';
    }

    public function getName()
    {
        return 'bitfield';
    }
}