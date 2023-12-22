<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

final class Parameter
{
    public function __construct( /** @phpstan-ignore-line */
        public readonly string $name,
        public readonly string $targetName,
        public readonly string $description,
        public readonly string $type,
        public readonly string|null $format,
        public readonly string $location,
        public readonly mixed $default,
        public readonly ExampleData $example,
    ) {
    }
}
