<?php

namespace VolodymyrKlymniuk\StdBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraints\Range;

class DateRange extends Range
{
    public $format = 'Y-m-d H:i:s';
    public $invalidMessage = 'validation.date.value';
}
