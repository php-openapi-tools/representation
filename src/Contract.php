<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

final class Contract
{
    /** @param array<Property> $properties */
    public function __construct(
        public readonly string $className,
        /** @var array<Property> $properties */
        public readonly array $properties,
    ) {
    }
}
