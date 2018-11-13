<?php

declare(strict_types=1);

namespace App\Infrastructure\DoctrineType;

use App\Domain\ValueObject\Uuid as UuidInterface;
use App\Infrastructure\ValueObject\Uuid;
use InvalidArgumentException;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

final class UuidType extends Type
{
    const NAME = 'app_invoice_uuid';

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getGuidTypeDeclarationSQL($fieldDeclaration);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if (empty($value)) {
            return null;
        }
        if ($value instanceof UuidInterface) {
            return $value;
        }
        try {
            $uuid = Uuid::fromString($value);
        } catch (InvalidArgumentException $e) {
            throw ConversionException::conversionFailed($value, static::NAME);
        }
        return $uuid;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (empty($value)) {
            return null;
        }
        if (
            $value instanceof UuidInterface
            || (
                (is_string($value) || method_exists($value, '__toString'))
                && Uuid::isValid((string) $value)
            )
        ) {
            return (string) $value;
        }
        throw ConversionException::conversionFailed($value, static::NAME);
    }
    /**
     * {@inheritdoc}
     *
     * @return string
     */
    public function getName()
    {
        return static::NAME;
    }
    /**
     * {@inheritdoc}
     *
     * @param \Doctrine\DBAL\Platforms\AbstractPlatform $platform
     * @return boolean
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        return true;
    }
}