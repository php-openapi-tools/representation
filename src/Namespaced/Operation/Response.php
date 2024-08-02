<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced\Operation;

use OpenAPITools\Representation\Namespaced\Property\Type;
use OpenAPITools\Representation\Namespaced\Schema;

final class Response
{
    public function __construct(
        public readonly int|string $code,
        public readonly string $contentType,
        public readonly string $description,
        public readonly Schema|Type $content,
    ) {
    }
}
