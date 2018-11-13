<?php

declare(strict_types=1);

namespace App\Infrastructure\ValueObject;

use App\Domain\ValueObject\Uuid as UuidInterface;
use Ramsey\Uuid\Uuid as ThirdPartyUuid;
use Ramsey\Uuid\UuidInterface as ThirdPartyUuidInterface;

final class Uuid implements UuidInterface
{
    private $uuid;

    public function __construct(ThirdPartyUuidInterface $uuid)
    {
        $this->uuid = $uuid;
    }

    public static function uuid4(): UuidInterface
    {
        return new self(ThirdPartyUuid::uuid4());
    }

    public static function fromString($value): UuidInterface
    {
        return new self(ThirdPartyUuid::fromString($value));
    }

    public static function isValid(string $param): bool
    {
        return ThirdPartyUuid::isValid($param);
    }

    public function toString(): string
    {
        return $this->uuid->toString();
    }

    public function __toString()
    {
        return $this->toString();
    }
}