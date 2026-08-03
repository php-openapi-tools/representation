<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced;

use OpenAPITools\Representation\ExampleData;
use OpenAPITools\Representation\Namespaced\Property\Type;

/** @api */
final readonly class Property
{
    /** @param array<mixed> $enum */
    public function __construct(
        public string $name,
        public string $sourceName,
        public string $description,
        public ExampleData $example,
        public Type $type,
        public bool $nullable,
        public array $enum,
    ) {
    }
}
