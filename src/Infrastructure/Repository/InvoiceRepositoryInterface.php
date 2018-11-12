<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

interface InvoiceRepositoryInterface
{
    /**
     * @return array
     * @throws \Exception
     */
    public function findAll(): array;
}