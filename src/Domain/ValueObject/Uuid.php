<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

interface Uuid
{
    public function toString(): string;

    public static function uuid4(): Uuid;

    public static function fromString($value): Uuid;

    public static function isValid(string $param): bool;
}