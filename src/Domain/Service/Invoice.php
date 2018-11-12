<?php

declare(strict_types=1);

namespace App\Domain\Service;

use App\Domain\Collection\Invoice as InvoiceCollection;

interface Invoice
{
    public function retrieveInvoicesWith(int $getLimit, int $getOffset): InvoiceCollection;
}