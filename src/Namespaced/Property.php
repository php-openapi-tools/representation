<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced;

use OpenAPITools\Representation\ExampleData;
use OpenAPITools\Representation\Namespaced\Property\Type;

final class Property
{
    /** @param array<mixed> $enum */
    public function __construct(
        public readonly string $name,
        public readonly string $sourceName,
        public readonly string $description,
        public readonly ExampleData $example,
        public readonly Type $type,
        public readonly bool $nullable,
        public readonly array $enum,
    ) {
    }
}
