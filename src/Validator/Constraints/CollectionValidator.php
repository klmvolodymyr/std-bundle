<?php

namespace VolodymyrKlymniuk\StdBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class CollectionValidator extends \Symfony\Component\Validator\Constraints\CollectionValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof Collection) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__ . '\Collection');
        }

        if (null === $value) {
            return;
        }

        if (!is_array($value) && !($value instanceof \Traversable && $value instanceof \ArrayAccess)) {
            $this->context->buildViolation($constraint->invalidMessage)
                ->setParameter('{{ value }}', $this->formatValue($value, self::PRETTY_DATE))
                ->addViolation();

            return;

        }

        parent::validate($value, $constraint);
    }
}