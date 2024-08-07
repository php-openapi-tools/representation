<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced\Operation;

use OpenAPITools\Representation\Namespaced\Header;

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
}
