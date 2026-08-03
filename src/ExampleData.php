<?php

declare(strict_types=1);

namespace OpenAPITools\Representation;

use PhpParser\Node;

/** @api */
final readonly class ExampleData
{
    public function __construct(
        public mixed $raw,
        public Node\Expr $node,
    ) {
    }
}
