<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

final class Path
{
    /** @param array<Operation> $operations */
    public function __construct(
        public readonly string $className,
        public readonly Hydrator $hydrator,
        /** @var array<Operation> $operations */
        public readonly array $operations,
    ) {
    }
}
