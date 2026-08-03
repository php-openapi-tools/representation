<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced;

use OpenAPITools\Utils\ClassString;

/** @api */
final readonly class Contract
{
    /** @param array<Property> $properties */
    public function __construct(
        public ClassString $className,
        /** @var array<Property> $properties */
        public array $properties,
    ) {
    }
}
