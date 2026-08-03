<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced;

use cebe\openapi\spec\Schema as baseSchema;
use OpenAPITools\Utils\ClassString;

/** @api */
final readonly class Schema
{
    /**
     * @param array<Contract> $contracts
     * @param array<mixed>    $example
     * @param array<Property> $properties
     * @param array<string>   $type
     * @param array<string>   $alias
     */
    public function __construct(
        public ClassString $className,
        /** @var array<Contract> $contracts */
        public array $contracts,
        public ClassString $errorClassName,
        public ClassString $errorClassNameAliased,
        public string $title,
        public string $description,
        /** @var array<mixed> $example */
        public array $example,
        /** @var array<Property> $properties */
        public array $properties,
        public baseSchema $schema,
        public bool $isArray,
        public array $type,
        public array $alias,
    ) {
    }
}
