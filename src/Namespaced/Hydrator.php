<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced;

use OpenAPITools\Utils\ClassString;

final class Hydrator
{
    /** @param array<Schema> $schemas */
    public function __construct(
        public readonly ClassString $className,
        public readonly string $methodName,
        /** @var array<Schema> $schemas */
        public readonly array $schemas,
    ) {
    }
}
