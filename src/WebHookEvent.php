<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

use OpenAPITools\Utils\Namespace_;

use function array_map;

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

    public function namespace(Namespace_ $namespace): Namespaced\WebHookEvent
    {
        return new Namespaced\WebHookEvent(
            $this->event,
            $this->hydrator->namespace($namespace),
            array_map(static fn (WebHook $webHook): Namespaced\WebHook => $webHook->namespace($namespace), $this->webHooks),
        );
    }
}
