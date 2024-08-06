<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

use OpenAPITools\Utils\Namespace_;

use function array_map;

final class Client
{
    /** @param array<Path> $paths */
    public function __construct( /** @phpstan-ignore-line */
        public readonly string|null $baseUrl,
        /** @var array<Path> $paths */
        public readonly array $paths,
    ) {
    }

    public function namespace(Namespace_ $namespace): Namespaced\Client
    {
        return new Namespaced\Client(
            $this->baseUrl,
            array_map(static fn (Path $path): Namespaced\Path => $path->namespace($namespace), $this->paths),
        );
    }
}
