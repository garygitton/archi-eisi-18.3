<?php

declare(strict_types=1);

namespace App\UI\Action;

use App\Infrastructure\Repository\Invoice;
use App\UI\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class HomeHtml
{
    private $invoiceRepository;

    private $renderer;

    public function __construct(Invoice $invoiceRepository, Environment $renderer)
    {
        $this->invoiceRepository = $invoiceRepository;
        $this->renderer = $renderer;
    }

    public function handle(): Response
    {
        return new Response($this->renderer->render('home.html.twig', [
            'invoices' => $this->invoiceRepository->findAll()
        ]));
    }
}