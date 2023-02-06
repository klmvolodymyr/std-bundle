<?php
declare(strict_types=1);

namespace VolodymyrKlymniuk\StdBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class CollectionUniqueItems extends Constraint
{
    public $message = 'validation.collection.unique_items';
    public $invalidMessage = 'validation.collection.invalid';
}