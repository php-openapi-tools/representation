<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced;

use OpenAPITools\Representation\ExampleData;

final class Header
{
    public function __construct(
        public readonly string $name,
        public readonly Schema $schema,
        public readonly ExampleData $example,
    ) {
    }
}
