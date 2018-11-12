<?php

declare(strict_types=1);

namespace App\UI\Action;

use App\Application\Query\FindAllInvoices;
use App\Application\QueryHandler\FindAllInvoicesHandler;
use App\Infrastructure\Repository\Invoice;
use App\UI\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class HomeHtml
{
    private $renderer;
    private $handler;

    public function __construct(Environment $renderer, FindAllInvoicesHandler $handler)
    {
        $this->renderer = $renderer;
        $this->handler = $handler;
    }

    public function handle(): Response
    {
        return new Response($this->renderer->render('home.html.twig', [
            'invoices' => $this->handler->handle(new FindAllInvoices()),
        ]));
    }
}