<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

use OpenAPITools\Utils\ClassString;
use OpenAPITools\Utils\Namespace_;

use function array_map;

final class Hydrator
{
    /** @param array<Schema> $schemas */
    public function __construct(
        public readonly string $className,
        public readonly string $methodName,
        /** @var array<Schema> $schemas */
        public readonly array $schemas,
    ) {
    }

    public function namespace(Namespace_ $namespace): Namespaced\Hydrator
    {
        return new Namespaced\Hydrator(
            ClassString::factory($namespace, $this->className),
            $this->methodName,
            array_map(static fn (Schema $schema): Namespaced\Schema => $schema->namespace($namespace), $this->schemas),
        );
    }
}
