<?php
declare(strict_types=1);

namespace VolodymyrKlymniuk\StdBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class FloatOrIntegerConstraint extends Constraint
{
    public $message = 'The value "{{ value }}" must be float or integer.';
}