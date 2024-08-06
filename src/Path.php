<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

use OpenAPITools\Utils\ClassString;
use OpenAPITools\Utils\Namespace_;

use function array_map;

final class Path
{
    /** @param array<Operation> $operations */
    public function __construct(
        public readonly string $className,
        public readonly Hydrator $hydrator,
        /** @var array<Operation> $operations */
        public readonly array $operations,
    ) {
    }

    public function namespace(Namespace_ $namespace): Namespaced\Path
    {
        return new Namespaced\Path(
            ClassString::factory($namespace, $this->className),
            $this->hydrator->namespace($namespace),
            array_map(static fn (Operation $operation): Namespaced\Operation => $operation->namespace($namespace), $this->operations),
        );
    }
}
