<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Property;

use OpenAPITools\Representation\Namespaced;
use OpenAPITools\Representation\Schema;
use OpenAPITools\Utils\Namespace_;

use function is_array;

/** @api */
final readonly class Type
{
    /** @param string|Schema|Type|array<Type> $payload */
    public function __construct(
        public string $type,
        public string|null $format,
        public string|null $pattern,
        public string|Schema|Type|array $payload,
        public bool $nullable,
    ) {
    }

    public function namespace(Namespace_ $namespace): Namespaced\Property\Type
    {
        if ($this->payload instanceof Schema || $this->payload instanceof Type) {
            $payload = $this->payload->namespace($namespace);
        } elseif (is_array($this->payload)) {
            $payload = [];
            foreach ($this->payload as $index => $type) {
                $payload[$index] = $type->namespace($namespace);
            }
        } else {
            $payload = $this->payload;
        }

        return new Namespaced\Property\Type(
            $this->type,
            $this->format,
            $this->pattern,
            $payload,
            $this->nullable,
        );
    }
}
