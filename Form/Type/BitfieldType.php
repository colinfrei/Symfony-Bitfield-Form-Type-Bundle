<?php

namespace ColinFrei\BitFieldTypeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use ColinFrei\BitFieldTypeBundle\Form\DataTransformer\BitfieldToArrayTransformer;

class BitfieldType extends AbstractType
{
    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'expanded' => true,
            'multiple' => true,
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addModelTransformer(new BitfieldToArrayTransformer());
    }

    /**
     * {@inheritDoc}
     */
    public function getParent()
    {
        return new ChoiceType();
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'bitfield';
    }
}
