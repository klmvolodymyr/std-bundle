<?php
declare(strict_types=1);

namespace VolodymyrKlymniuk\StdBundle\Hide;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Query\Filter\BsonFilter;
//use VolodymyrKlymniuk\Doctrine\Odm\Document\Interfaces\HideableInterface;

class HideFilter extends BsonFilter
{
    /**
     * @var string[]
     */
    private $ids = [];

    /**
     * @var string[]
     */
    private $applyFor = [];

    /**
     * @param string $id
     *
     * @return static
     */
    public function addHideFor(string $id): self
    {
        $this->ids[] = $id;

        return $this;
    }

    /**
     * @param string $applyFor
     *
     * @return static
     */
    public function addApplyFor(string $applyFor): self
    {
        $this->applyFor[] = $applyFor;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function addFilterCriteria(ClassMetadata $class)
    {
        if (!$class->reflClass->implementsInterface(HideableInterface::class)) {
            return [];
        }
        if (!$this->isApplyForClass($class)) {
            return [];
        }

        return [
            'hideFor' => ['$nin' => $this->ids],
        ];
    }

    /**
     * @param ClassMetadata $class
     *
     * @return bool
     */
    private function isApplyForClass(ClassMetadata $class): bool
    {
        if (empty($this->applyFor)) {
            return true;
        }
        foreach ($this->applyFor as $applyFor) {
            if ($class->name === $applyFor || $class->reflClass->isSubclassOf($applyFor)) {
                return true;
            }
        }

        return false;
    }
}