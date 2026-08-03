<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

use OpenAPITools\Representation\Property\Type;
use OpenAPITools\Utils\Namespace_;

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
