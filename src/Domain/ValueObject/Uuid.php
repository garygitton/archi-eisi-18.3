<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

interface Uuid
{
    public function toString(): string;

    public static function uuid4(): Uuid;
}