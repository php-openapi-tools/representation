<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

use OpenAPITools\Utils\ClassString;
use OpenAPITools\Utils\Namespace_;

use function array_map;

/** @api */
final readonly class Path
{
    /** @param array<Operation> $operations */
    public function __construct(
        public string $className,
        public Hydrator $hydrator,
        /** @var array<Operation> $operations */
        public array $operations,
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
