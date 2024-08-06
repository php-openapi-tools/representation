<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Operation;

use OpenAPITools\Representation\Header;
use OpenAPITools\Representation\Namespaced;
use OpenAPITools\Utils\Namespace_;

use function array_map;

final readonly class EmptyResponse
{
    /** @param array<Header> $headers */
    public function __construct(
        public int $code,
        public string $description,
        /** @var array<Header> $headers */
        public array $headers,
    ) {
    }

    public function namespace(Namespace_ $namespace): Namespaced\Operation\EmptyResponse
    {
        return new Namespaced\Operation\EmptyResponse(
            $this->code,
            $this->description,
            array_map(static fn (Header $header): Namespaced\Header => $header->namespace($namespace), $this->headers),
        );
    }
}
