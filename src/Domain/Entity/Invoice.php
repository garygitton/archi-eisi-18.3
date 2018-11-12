<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use DateTimeInterface;
use JsonSerializable;
use Ramsey\Uuid\UuidInterface;

class Invoice implements JsonSerializable
{
    private $uuid;

    private $creationDate;

    public function __construct(UuidInterface $uuid, DateTimeInterface $creationDate)
    {
        $this->uuid = $uuid;
        $this->creationDate = $creationDate;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->uuid->toString(),
            'creation_date' => $this->creationDate->format(DateTimeInterface::ATOM),
        ];
    }
}