<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

final readonly class Representation
{
    /**
     * @param array<WebHook> $webHooks
     * @param array<Schema> $schemas
     */
    public function __construct(
        public Client $client,
        /** @var array<WebHook> $webHooks */
        public array $webHooks,
        /** @array<Schema> $schemas */
        public array $schemas,
    ) {
    }
}
