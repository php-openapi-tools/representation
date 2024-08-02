<?php

declare(strict_types=1);

namespace OpenAPITools\Representation\Namespaced;

use cebe\openapi\spec\ExternalDocumentation;
use OpenAPITools\Representation\Namespaced\Operation\EmptyResponse;
use OpenAPITools\Representation\Namespaced\Operation\RequestBody;
use OpenAPITools\Representation\Namespaced\Operation\Response;
use OpenAPITools\Representation\Parameter;
use OpenAPITools\Utils\ClassString;

final readonly class Operation
{
    /**
     * @param array<mixed>         $metaData
     * @param array<string>        $returnType
     * @param array<Parameter>     $parameters
     * @param array<RequestBody>   $requestBody
     * @param array<Response>      $response
     * @param array<EmptyResponse> $empty
     */
    public function __construct( /** @phpstan-ignore-line */
        public ClassString $className,
        public ClassString $classNameSanitized,
        public ClassString $operatorClassName,
        public string $operatorLookUpMethod,
        public string $name,
        public string $nameCamel,
        public string|null $group,
        public string|null $groupCamel,
        public string $operationId,
        public string $matchMethod,
        public string $method,
        public string $summary,
        public ExternalDocumentation|null $externalDocs,
        public string $path,
        /** @var array<mixed> $metaData */
        public array $metaData,
        /** @var array<string> $returnType */
        public array $returnType,
        /** @var array<Parameter> $parameters */
        public array $parameters,
        /** @var array<RequestBody> $requestBody */
        public array $requestBody,
        /** @var array<Response> $response */
        public array $response,
        /** @var array<EmptyResponse> $empty */
        public array $empty,
    ) {
    }
}
