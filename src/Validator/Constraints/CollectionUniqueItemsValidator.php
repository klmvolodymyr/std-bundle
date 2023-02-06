<?php
declare(strict_types=1);

namespace VolodymyrKlymniuk\StdBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class CollectionUniqueItemsValidator extends \Symfony\Component\Validator\Constraints\CollectionValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof CollectionUniqueItems) {
            throw new UnexpectedTypeException($constraint, __NAMESPACE__.'\CollectionUniqueItems');
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

        if (count($value) !== count(array_unique($value))) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}