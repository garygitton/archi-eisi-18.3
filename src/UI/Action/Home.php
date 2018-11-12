<?php

declare(strict_types=1);

namespace App\UI\Action;

use App\Infrastructure\Repository\Invoice;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class Home
{
    private $invoiceRepository;

    public function __construct(Invoice $invoiceRepository)
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