<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Collection\Invoice as InvoiceCollection;
use Psr\SimpleCache\CacheInterface;

final class CachedInvoice implements \App\Domain\Repository\Invoice
{
    private const CACHE_KEY = 'app.invoices.all';
    private $repository;
    private $cache;

    public function __construct(\App\Domain\Repository\Invoice $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    public function findAll(): InvoiceCollection
    {
        if ($this->cache->has(self::CACHE_KEY)) {
            return $this->cache->get(self::CACHE_KEY);
        }

        $data = $this->repository->findAll();
        $this->cache->set(self::CACHE_KEY, $data);

        return $data;
    }
}