<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

use OpenAPITools\Utils\ClassString;
use OpenAPITools\Utils\Namespace_;

use function array_map;

/** @api */
final readonly class Contract
{
    /** @param array<Property> $properties */
    public function __construct(
        public string $className,
        /** @var array<Property> $properties */
        public array $properties,
    ) {
    }

    public function namespace(Namespace_ $namespace): Namespaced\Contract
    {
        return new Namespaced\Contract(
            ClassString::factory($namespace, $this->className),
            array_map(static fn (Property $property): Namespaced\Property => $property->namespace($namespace), $this->properties),
        );
    }
}
