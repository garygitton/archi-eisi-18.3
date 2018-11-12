<?php

declare(strict_types=1);

namespace App\UI\Action;

use App\Application\Query\FindAllInvoices;
use App\Application\QueryHandler\FindAllInvoicesHandler;
use App\UI\Serializer\Serializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class Home
{
    private $serializer;
    private $handler;

    public function __construct(FindAllInvoicesHandler $handler, Serializer $serializer)
    {
        $this->serializer = $serializer;
        $this->handler = $handler;
    }

    public function handle(): Response
    {
        return new JsonResponse([
            'success' => true,
            'invoices' => $this->serializer->serialize($this->handler->handle(new FindAllInvoices())),
        ]);
    }
}