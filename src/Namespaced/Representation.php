<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced;

use OpenAPITools\Representation\WebHook;

final readonly class Representation
{
    /**
     * @param array<WebHook> $webHooks
     * @param array<Schema>  $schemas
     */
    public function __construct(
        public Client $client,
        /** @var array<WebHook> $webHooks */
        public array $webHooks,
        /** @var array<Schema> $schemas */
        public array $schemas,
    ) {
    }
}
