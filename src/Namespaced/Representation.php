<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced;

/** @api */
final readonly class Representation
{
    /**
     * @param array<WebHookEvent> $webHooks
     * @param array<Schema>       $schemas
     */
    public function __construct(
        public Client $client,
        /** @var array<WebHookEvent> $webHooks */
        public array $webHooks,
        /** @var array<Schema> $schemas */
        public array $schemas,
    ) {
    }
}
