<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

use OpenAPITools\Representation\Property\Type;
use OpenAPITools\Utils\Namespace_;

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

    public function namespace(Namespace_ $namespace): Namespaced\Property
    {
        return new Namespaced\Property(
            $this->name,
            $this->sourceName,
            $this->description,
            $this->example,
            $this->type->namespace($namespace),
            $this->nullable,
            $this->enum,
        );
    }
}
