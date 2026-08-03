<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

use OpenAPITools\Utils\Namespace_;

use function array_map;

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

    public function namespace(Namespace_ $namespace): Namespaced\Representation
    {
        return new Namespaced\Representation(
            $this->client->namespace($namespace),
            array_map(static fn (WebHookEvent $webHookEvent): Namespaced\WebHookEvent => $webHookEvent->namespace($namespace), $this->webHooks),
            array_map(static fn (Schema $schema): Namespaced\Schema => $schema->namespace($namespace), $this->schemas),
        );
    }
}
