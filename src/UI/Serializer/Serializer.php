<?php

declare(strict_types=1);

namespace App\UI\Serializer;

use App\Domain\Collection\Invoice as InvoiceCollection;
use App\Domain\Entity\Invoice;
use DateTimeInterface;

final class Serializer
{
    public function serialize(InvoiceCollection $findAll)
    {
        $data = array_values((array) $findAll)[0];

        return array_map([$this, 'serializeObject'], $data);
    }

    private function serializeObject(Invoice $invoice): array
    {
        $closure = \Closure::bind(\Closure::fromCallable(function(): array {
            return [
                'id' => $this->uuid->toString(),
                'creation_date' => $this->creationDate->format(DateTimeInterface::ATOM),
            ];
        }), $invoice, Invoice::class);

        return $closure();
    }
}
