<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

use OpenAPITools\Utils\Namespace_;

/** @api */
final readonly class Header
{
    public function __construct(
        public string $name,
        public Schema $schema,
        public ExampleData $example,
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
