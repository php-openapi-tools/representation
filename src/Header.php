<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

use OpenAPITools\Utils\Namespace_;

final class Header
{
    public function __construct(
        public readonly string $name,
        public readonly Schema $schema,
        public readonly ExampleData $example,
    ) {
    }

    public function namespace(Namespace_ $namespace): Namespaced\Header
    {
        return new Namespaced\Header(
            $this->name,
            $this->schema->namespace($namespace),
            $this->example,
        );
    }
}
