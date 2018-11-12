<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Entity\Invoice;
use DateTimeImmutable;
use Ramsey\Uuid\Uuid;

final class InvoiceRepository implements InvoiceRepositoryInterface
{
    /**
     * @return array
     * @throws \Exception
     */
    public function findAll(): array
    {
        return [
            new Invoice(Uuid::uuid4(), new DateTimeImmutable()),
        ];
    }
}