<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Collection\Invoice as InvoiceCollection;
use App\Domain\Entity\Invoice as InvoiceEntity;
use App\Domain\Repository\Invoice as InvoiceRepositoryInterface;
use App\Infrastructure\ValueObject\Uuid;
use DateTimeImmutable;

final class Invoice implements InvoiceRepositoryInterface
{
    /**
     * @return InvoiceCollection
     * @throws \Exception
     */
    public function findAll(): InvoiceCollection
    {
        return new InvoiceCollection(...[
            new InvoiceEntity(Uuid::uuid4(), new DateTimeImmutable()),
            new InvoiceEntity(Uuid::uuid4(), new DateTimeImmutable()),
            new InvoiceEntity(Uuid::uuid4(), new DateTimeImmutable()),
            new InvoiceEntity(Uuid::uuid4(), new DateTimeImmutable()),
        ]);
    }
}