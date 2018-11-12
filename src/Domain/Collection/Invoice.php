<?php

declare(strict_types=1);

namespace App\Domain\Collection;

use App\Domain\Entity\Invoice as InvoiceEntity;
use IteratorAggregate;

final class Invoice implements IteratorAggregate
{
    private $collection;

    public function __construct(InvoiceEntity ...$collection)
    {
        $this->collection = $collection;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->collection);
    }
}