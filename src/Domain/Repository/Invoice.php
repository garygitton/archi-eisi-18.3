<?php

declare(strict_types=1);

namespace App\Domain\Repository;

interface Invoice
{
    /**
     * @return array
     * @throws \Exception
     */
    public function findAll(): array;
}