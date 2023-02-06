<?php
declare(strict_types=1);

namespace VolodymyrKlymniuk\StdBundle\Hide;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Query\Filter\BsonFilter;

trait HideTrait
{
    /**
     * @var DocumentManager
     */
    private $dm;

    /**
     * @required
     *
     * @param DocumentManager $dm
     *
     * @return static
     */
    public function setDm(DocumentManager $dm): self
    {
        $this->dm = $dm;

        return $this;
    }

    /**
     * @param string $id
     *
     * @return static
     */
    public function hideFor(string $id): self
    {
        $this
            ->getFilter()
            ->addHideFor($id);

        return $this;
    }

    /**
     * @param string $applyFor
     *
     * @return static
     */
    public function applyFor(string $applyFor): self
    {
        $this
            ->getFilter()
            ->addApplyFor($applyFor);

        return $this;
    }

    /**
     * @return HideFilter|BsonFilter
     */
    private function getFilter(): HideFilter
    {
        $filters = $this->dm->getFilterCollection();
        $filters->enable('hideable');

        return $filters->getFilter('hideable');
    }
}