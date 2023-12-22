<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Operation;

use OpenAPITools\Representation\Property\Type;
use OpenAPITools\Representation\Schema;

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
