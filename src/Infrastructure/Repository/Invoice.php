<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Collection\Invoice as InvoiceCollection;
use App\Domain\Entity\Invoice as InvoiceEntity;
use App\Domain\Repository\Invoice as InvoiceRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

final class Invoice implements InvoiceRepositoryInterface
{
    private $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(InvoiceEntity::class);
    }

    /**
     * @return InvoiceCollection
     * @throws \Exception
     */
    public function findAll(): InvoiceCollection
    {
        return new InvoiceCollection(...$this->repository->findAll());
    }
}
