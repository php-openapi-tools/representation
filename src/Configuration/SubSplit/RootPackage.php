<?php

declare(strict_types=1);

namespace ApiClients\Tools\OpenApiClientGenerator\Configuration\SubSplit;

final readonly class RootPackage
{
    public function __construct(
        public string $name,
        public string $repository,
    ) {
    }
}
