<?php

namespace VolodymyrKlymniuk\StdBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\RangeValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class DateRangeValidator extends RangeValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof DateRange) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__.'\DateRange');
        }

        if (null === $value) {
            return;
        }

        if (!$value instanceof \DateTimeInterface) {
            $value = \DateTime::createFromFormat($constraint->format, $value);
        }

        parent::validate($value, $constraint);
    }
}