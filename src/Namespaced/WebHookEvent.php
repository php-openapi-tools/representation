<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced;

/** @api */
final readonly class WebHookEvent
{
    /** @param array<WebHook> $webHooks */
    public function __construct(
        public string $event,
        public Hydrator $hydrator,
        /** @var array<WebHook> */
        public array $webHooks,
    ) {
    }
}
