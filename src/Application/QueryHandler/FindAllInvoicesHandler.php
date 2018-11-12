<?php

declare(strict_types=1);

namespace App\Application\QueryHandler;

use App\Application\Query\FindAllInvoices;
use App\Domain\Collection\Invoice as InvoiceCollection;
use App\Domain\Service\Invoice;

final class FindAllInvoicesHandler
{
    private $invoiceService;

    public function __construct(Invoice $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    public function handle(FindAllInvoices $query): InvoiceCollection
    {
        return $this->invoiceService->retrieveInvoicesWith(
            $query->getLimit(),
            $query->getOffset()
        );
    }
}