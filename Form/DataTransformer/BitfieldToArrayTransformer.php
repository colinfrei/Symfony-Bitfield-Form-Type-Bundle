<?php

namespace ColinFrei\BitFieldTypeBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

class BitfieldToArrayTransformer implements DataTransformerInterface
{
    const MAX_BITFIELDS_32 = 0x7FFFFFFF;

    public function transform($bits)
    {
        $validBits = array();
        $currentBit = 1;

        while ($currentBit < BitfieldToArrayTransformer::MAX_BITFIELDS_32)
        {
            if ($currentBit & $bits) {
                $validBits[] = $currentBit;
            }

            $currentBit <<= 1;
        }

        return $validBits;
    }

    public function reverseTransform($array)
    {
        $bits = 0;
        foreach ($array AS $value) {
            $bits += $value;
        }

        return $bits;
    }
}