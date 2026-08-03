<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced\Operation;

use OpenAPITools\Representation\Namespaced\Property\Type;
use OpenAPITools\Representation\Namespaced\Schema;

/** @api */
final readonly class Response
{
    public function __construct(
        public int|string $code,
        public string $contentType,
        public string $description,
        public Schema|Type $content,
    ) {
    }
}
