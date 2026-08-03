<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Operation;

use OpenAPITools\Representation\Namespaced;
use OpenAPITools\Representation\Schema;
use OpenAPITools\Utils\Namespace_;

/** @api */
final readonly class RequestBody
{
    public function __construct(
        public string $contentType,
        public Schema $schema,
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
