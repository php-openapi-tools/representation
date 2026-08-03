<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced;

use OpenAPITools\Utils\ClassString;

/** @api */
final readonly class Path
{
    /** @param array<Operation> $operations */
    public function __construct(
        public ClassString $className,
        public Hydrator $hydrator,
        /** @var array<Operation> $operations */
        public array $operations,
    ) {
    }
}
