<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

final class Hydrator
{
    /** @param array<Schema> $schemas */
    public function __construct(
        public readonly string $className,
        public readonly string $methodName,
        /** @var array<Schema> $schemas */
        public readonly array $schemas,
    ) {
    }
}
