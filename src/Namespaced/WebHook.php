<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced;

/** @api */
final readonly class WebHook
{
    /**
     * @param array<Header>         $headers
     * @param array<string, Schema> $schema
     */
    public function __construct(
        public string $event,
        public string $summary,
        public string $description,
        public string $operationId,
        public string $documentationUrl,
        /** @var array<Header> */
        public array $headers,
        /** @var array<string, Schema> */
        public array $schema,
    ) {
    }
}
