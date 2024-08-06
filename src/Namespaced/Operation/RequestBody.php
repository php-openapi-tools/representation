<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced\Operation;

use OpenAPITools\Representation\Namespaced\Schema;

final class RequestBody
{
    public function __construct(
        public readonly string $contentType,
        public readonly Schema $schema,
    ) {
    }
}
