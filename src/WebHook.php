<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

use OpenAPITools\Utils\Namespace_;

use function array_map;

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

    public function namespace(Namespace_ $namespace): Namespaced\WebHook
    {
        return new Namespaced\WebHook(
            $this->event,
            $this->summary,
            $this->description,
            $this->operationId,
            $this->documentationUrl,
            array_map(static fn (Header $header): Namespaced\Header => $header->namespace($namespace), $this->headers),
            array_map(static fn (Schema $schema): Namespaced\Schema => $schema->namespace($namespace), $this->schema),
        );
    }
}
