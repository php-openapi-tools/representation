<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

use PhpParser\Node;

final class ExampleData
{
    public function __construct(
        public readonly mixed $raw,
        public readonly Node\Expr $node,
    ) {
    }
}
