<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced\Property;

use OpenAPITools\Representation\Namespaced\Schema;

/** @api */
final readonly class Type
{
    /** @param string|Schema|Type|array<Type> $payload */
    public function __construct(
        public string $type,
        public string|null $format,
        public string|null $pattern,
        public string|Schema|Type|array $payload,
        public bool $nullable,
    ) {
    }
}
