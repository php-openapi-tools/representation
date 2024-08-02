<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Operation;

use OpenAPITools\Representation\Namespaced;
use OpenAPITools\Representation\Schema;
use OpenAPITools\Utils\Namespace_;

final class RequestBody
{
    public function __construct(
        public readonly string $contentType,
        public readonly Schema $schema,
    ) {
    }

    public function namespace(Namespace_ $namespace): Namespaced\Operation\RequestBody
    {
        return new Namespaced\Operation\RequestBody(
            $this->contentType,
            $this->schema->namespace($namespace),
        );
    }
}
