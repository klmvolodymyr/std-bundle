<?php

namespace VolodymyrKlymniuk\StdBundle\Validator\Constraints;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
class Collection extends \Symfony\Component\Validator\Constraints\Collection
{
    public $invalidMessage = 'validation.collection.invalid';
}
