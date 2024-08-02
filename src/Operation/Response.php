<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Operation;

use OpenAPITools\Representation\Namespaced;
use OpenAPITools\Representation\Property\Type;
use OpenAPITools\Representation\Schema;
use OpenAPITools\Utils\Namespace_;

final class Response
{
    public function __construct(
        public readonly int|string $code,
        public readonly string $contentType,
        public readonly string $description,
        public readonly Schema|Type $content,
    ) {
    }

    public function namespace(Namespace_ $namespace): Namespaced\Operation\Response
    {
        return new Namespaced\Operation\Response(
            $this->code,
            $this->contentType,
            $this->description,
            $this->content->namespace($namespace),
        );
    }
}
