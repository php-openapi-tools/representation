<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Property;

use OpenAPITools\Representation\Schema;

final class Type
{
    /** @param string|Schema|Type|array<Type> $payload */
    public function __construct( /** @phpstan-ignore-line */
        public readonly string $type,
        public readonly string|null $format,
        public readonly string|null $pattern,
        public readonly string|Schema|Type|array $payload,
        public readonly bool $nullable,
    ) {
    }
}
