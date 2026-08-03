<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced;

use OpenAPITools\Representation\ExampleData;

/** @api */
final readonly class Header
{
    public function __construct(
        public string $name,
        public Schema $schema,
        public ExampleData $example,
    ) {
    }
}
