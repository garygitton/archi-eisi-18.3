<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Entity\Invoice as InvoiceEntity;
use App\Domain\Repository\Invoice as InvoiceRepositoryInterface;
use App\Infrastructure\ValueObject\Uuid;
use DateTimeImmutable;

final class Invoice implements InvoiceRepositoryInterface
{
    /**
     * @return array
     * @throws \Exception
     */
    public function findAll(): array
    {
        return [
            new InvoiceEntity(Uuid::uuid4(), new DateTimeImmutable()),
        ];
    }
}