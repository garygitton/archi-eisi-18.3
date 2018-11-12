<?php

declare(strict_types=1);

namespace App\UI\Action;

use App\Infrastructure\Repository\InvoiceRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class Home
{
    private $invoiceRepository;

    public function __construct(InvoiceRepositoryInterface $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function handle(): Response
    {
        return new JsonResponse([
            'success' => true,
            'invoices' => $this->invoiceRepository->findAll(),
        ]);
    }
}