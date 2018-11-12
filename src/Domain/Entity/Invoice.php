<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\ValueObject\Uuid;
use DateTimeInterface;
use JsonSerializable;

class Invoice implements JsonSerializable
{
    private $uuid;

    private $creationDate;

    public function __construct(Uuid $uuid, DateTimeInterface $creationDate)
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