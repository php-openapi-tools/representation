<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

use cebe\openapi\spec\Schema as baseSchema;
use OpenAPITools\Utils\ClassString;
use OpenAPITools\Utils\Namespace_;

use function array_map;

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
        public string $className,
        /** @var array<Contract> $contracts */
        public array $contracts,
        public string $errorClassName,
        public string $errorClassNameAliased,
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

    public function namespace(Namespace_ $namespace): Namespaced\Schema
    {
        return new Namespaced\Schema(
            ClassString::factory($namespace, $this->className),
            array_map(static fn (Contract $contract): Namespaced\Contract => $contract->namespace($namespace), $this->contracts),
            ClassString::factory($namespace, $this->errorClassName),
            ClassString::factory($namespace, $this->errorClassNameAliased),
            $this->title,
            $this->description,
            $this->example,
            array_map(static fn (Property $property): Namespaced\Property => $property->namespace($namespace), $this->properties),
            $this->schema,
            $this->isArray,
            $this->type,
            $this->alias,
        );
    }
}
