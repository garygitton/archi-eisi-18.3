<?php

declare(strict_types=1);

namespace App\Infrastructure\Service;

use App\Domain\Collection\Invoice as InvoiceCollection;
use App\Domain\Service\Invoice as InvoiceServiceInterface;
use App\Domain\Repository\Invoice as InvoiceRepository;

final class Invoice implements InvoiceServiceInterface
{
    private $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function retrieveInvoicesWith(int $getLimit, int $getOffset): InvoiceCollection
    {
        return $this->invoiceRepository->findAll();
    }
}