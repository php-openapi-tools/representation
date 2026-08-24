# representation

User-friendly OpenAPI spec representation for [OpenAPI Tools](https://github.com/php-openapi-tools) code generators.

![Continuous Integration](https://github.com/php-openapi-tools/representation/workflows/Continuous%20Integration/badge.svg)
[![Latest Stable Version](https://poser.pugx.org/openapi-tools/representation/v/stable.png)](https://packagist.org/packages/openapi-tools/representation)
[![Total Downloads](https://poser.pugx.org/openapi-tools/representation/downloads.png)](https://packagist.org/packages/openapi-tools/representation/stats)
[![License](https://poser.pugx.org/openapi-tools/representation/license.png)](https://packagist.org/packages/openapi-tools/representation)

## Installation

To install via [Composer](https://getcomposer.org/), use the command below, it will automatically detect the latest version and bind it with `^`.

```
composer require openapi-tools/representation
```

## Components

| Class | Purpose |
| --- | --- |
| `Representation` | Root value object holding client paths, webhooks, and schemas |
| `Client` | API client metadata and path collection |
| `Path` | Path item with operations and hydrator |
| `Operation` | HTTP operation with parameters, request body, and responses |
| `Operation\RequestBody` | Request body content type and schema |
| `Operation\Response` | Response status, content type, and schema |
| `Operation\EmptyResponse` | Response without body but with headers |
| `Parameter` | Operation parameter metadata |
| `Schema` | OpenAPI schema mapped to a PHP class |
| `Contract` | Interface contract derived from a schema |
| `Property` | Schema property with type and example data |
| `Property\Type` | Resolved property type (scalar, schema, or nested union) |
| `Header` | Response header with schema and example |
| `Hydrator` | Object hydrator class for a path or webhook |
| `WebHook` | Webhook event metadata and payload schemas |
| `ExampleData` | Raw example value and corresponding AST node |
| `Namespaced\Representation` | Namespace-resolved root representation |
| `Namespaced\Client` | Namespace-resolved client |
| `Namespaced\Path` | Namespace-resolved path with `ClassString` hydrator |
| `Namespaced\Operation` | Namespace-resolved operation with `ClassString` class names |
| `Namespaced\Operation\RequestBody` | Namespace-resolved request body |
| `Namespaced\Operation\Response` | Namespace-resolved response |
| `Namespaced\Operation\EmptyResponse` | Namespace-resolved empty response |
| `Namespaced\Schema` | Namespace-resolved schema with `ClassString` class names |
| `Namespaced\Contract` | Namespace-resolved contract |
| `Namespaced\Property` | Namespace-resolved property |
| `Namespaced\Property\Type` | Namespace-resolved property type |
| `Namespaced\Header` | Namespace-resolved header |
| `Namespaced\Hydrator` | Namespace-resolved hydrator |

## Usage

### Root representation

Build a representation from parsed OpenAPI data, then resolve class names against a target namespace:

```php
use OpenAPITools\Representation\Representation;
use OpenAPITools\Utils\Namespace_;

$representation = new Representation(
    client: $client,
    webHooks: $webHooks,
    schemas: $schemas,
);

$namespaced = $representation->namespace(
    new Namespace_('Vendor\\Api', 'Vendor\\Tests\\Api'),
);
```

Each type exposes a `namespace()` method that returns its `Namespaced\` counterpart. Namespaced types carry fully qualified `ClassString` values for source and test namespaces, ready for code generators to emit PHP files.

### Schemas and contracts

```php
use OpenAPITools\Representation\Contract;
use OpenAPITools\Representation\Property;
use OpenAPITools\Representation\Schema;

$schema = new Schema(
    className: 'Schema\\User',
    contracts: [
        new Contract('Contract\\User', [$property]),
    ],
    errorClassName: 'Schema\\Error\\User',
    errorClassNameAliased: 'Schema\\ErrorAlias\\User',
    title: 'User',
    description: 'A user resource',
    example: [],
    properties: [$property],
    schema: $openApiSchema,
    isArray: false,
    type: [],
    alias: [],
);

$namespaced = $schema->namespace($namespace);

$namespaced->className->fullyQualified->source;               // \Vendor\Api\Schema\User
$namespaced->errorClassName->fullyQualified->source;          // \Vendor\Api\Schema\Error\User
$namespaced->contracts[0]->className->fullyQualified->source; // \Vendor\Api\Contract\User
```

### Operations

```php
use OpenAPITools\Representation\Operation;
use OpenAPITools\Representation\Operation\RequestBody;
use OpenAPITools\Representation\Operation\Response;

$operation = new Operation(
    className: 'Operation\\CreateUser',
    classNameSanitized: 'Operation\\CreateUser',
    operatorClassName: 'Operator\\CreateUser',
    operatorLookUpMethod: 'createUser',
    name: 'create user',
    nameCamel: 'createUser',
    group: null,
    groupCamel: null,
    operationId: 'createUser',
    matchMethod: 'createUser',
    method: 'POST',
    summary: 'Create a user',
    externalDocs: null,
    path: '/users',
    metaData: [],
    returnType: ['application/json'],
    parameters: [],
    requestBody: [
        new RequestBody('application/json', $schema),
    ],
    response: [
        new Response(200, 'application/json', 'OK', $schema),
    ],
    empty: [],
);

$namespaced = $operation->namespace($namespace);

$namespaced->className->fullyQualified->source;                         // \Vendor\Api\Operation\CreateUser
$namespaced->operatorClassName->fullyQualified->source;                 // \Vendor\Api\Operator\CreateUser
$namespaced->requestBody[0]->schema->className->fullyQualified->source; // \Vendor\Api\Schema\User
```

### Paths and hydrators

```php
use OpenAPITools\Representation\Hydrator;
use OpenAPITools\Representation\Path;

$path = new Path(
    className: 'Path\\Users',
    hydrator: new Hydrator(
        className: 'Hydrators\\Users',
        methodName: 'users',
        schemas: [$schema],
    ),
    operations: [$operation],
);

$namespaced = $path->namespace($namespace);

$namespaced->className->fullyQualified->source;                       // \Vendor\Api\Path\Users
$namespaced->hydrator->className->fullyQualified->source;             // \Vendor\Api\Hydrators\Users
$namespaced->hydrator->schemas[0]->className->fullyQualified->source; // \Vendor\Api\Schema\User
```

### Webhooks

```php
use OpenAPITools\Representation\WebHook;

$webHook = new WebHook(
    event: 'user.created',
    summary: 'User created',
    description: 'Sent when a user is created',
    operationId: 'userCreated',
    documentationUrl: 'https://example.com/docs/webhooks/user-created',
    headers: [$header],
    schema: ['application/json' => $schema],
);
```

Webhook entries live on the root `Representation` and are resolved when calling `Representation::namespace()`.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The MIT License (MIT)

Copyright (c) 2026 Cees-Jan Kiewiet

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
