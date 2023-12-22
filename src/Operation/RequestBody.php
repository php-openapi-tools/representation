<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Operation;

use OpenAPITools\Representation\Schema;

final class RequestBody
{
    public function __construct(
        public readonly string $contentType,
        public readonly Schema $schema,
    ) {
    }
}
