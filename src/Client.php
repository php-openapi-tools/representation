<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

final class Client
{
    /** @param array<Path> $paths */
    public function __construct( /** @phpstan-ignore-line */
        public readonly string|null $baseUrl,
        /** @var array<Path> $paths */
        public readonly array $paths,
    ) {
    }
}
