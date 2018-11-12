<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\ValueObject\Uuid;
use DateTimeInterface;

class Invoice
{
    private $uuid;

    private $creationDate;

    public function __construct(Uuid $uuid, DateTimeInterface $creationDate)
    {
        $this->uuid = $uuid;
        $this->creationDate = $creationDate;
    }

    public function date(): DateTimeInterface
    {
        return $this->creationDate;
    }

    public function id(): string
    {
        return $this->uuid->toString();
    }
}