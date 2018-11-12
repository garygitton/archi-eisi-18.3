<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Collection\Invoice as InvoiceCollection;

interface Invoice
{
    /**
     * @return InvoiceCollection
     * @throws \Exception
     */
    public function findAll(): InvoiceCollection;
}