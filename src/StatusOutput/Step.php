<?php

declare(strict_types=1);

namespace ApiClients\Tools\OpenApiClientGenerator\StatusOutput;

final readonly class Step
{
    public function __construct(public string $key, public string $name, public bool $progressBer)
    {
    }
}
