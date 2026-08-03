<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced\Operation;

use OpenAPITools\Representation\Namespaced\Schema;

/** @api */
final readonly class RequestBody
{
    public function __construct(
        public string $contentType,
        public Schema $schema,
    ) {
    }
}
