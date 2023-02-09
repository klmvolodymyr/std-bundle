<?php
declare(strict_types=1);

namespace VolodymyrKlymniuk\StdBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraints\Composite;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
class All extends Composite
{
    public $constraints = [];
    public $invalidMessage = 'validation.all.invalid';

    /**
     * @return string
     */
    public function getDefaultOption(): string
    {
        return 'constraints';
    }

    /**
     * @return array
     */
    public function getRequiredOptions(): array
    {
        return ['constraints'];
    }

    /**
     * @return string
     */
    protected function getCompositeOption(): string
    {
        return 'constraints';
    }
}