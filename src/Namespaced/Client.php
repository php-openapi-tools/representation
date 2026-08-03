<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced;

/** @api */
final readonly class Client
{
    /** @param array<Path> $paths */
    public function __construct(
        public string|null $baseUrl,
        /** @var array<Path> $paths */
        public array $paths,
    ) {
    }
}
