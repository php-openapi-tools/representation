<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

/** @api */
final readonly class Parameter
{
    public function __construct(
        public string $name,
        public string $targetName,
        public string $description,
        public string $type,
        public string|null $format,
        public string $location,
        public mixed $default,
        public ExampleData $example,
    ) {
    }
}
