<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced;

use OpenAPITools\Utils\ClassString;

/** @api */
final readonly class Hydrator
{
    /** @param array<Schema> $schemas */
    public function __construct(
        public ClassString $className,
        public string $methodName,
        /** @var array<Schema> $schemas */
        public array $schemas,
    ) {
    }
}
