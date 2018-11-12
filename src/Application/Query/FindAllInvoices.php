<?php

declare(strict_types=1);

namespace App\Application\Query;

final class FindAllInvoices
{
    private $limit;

    private $offset;

    public function __construct(int $limit = 2, int $offset = 0)
    {
        $this->limit = $limit;
        $this->offset = $offset;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }
}
