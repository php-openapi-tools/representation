<?php

declare(strict_types=1);

namespace OpenAPITools\Tests\Representation;

use OpenAPITools\Representation\Client;
use OpenAPITools\Representation\Contract;
use OpenAPITools\Representation\ExampleData;
use OpenAPITools\Representation\Header;
use OpenAPITools\Representation\Hydrator;
use OpenAPITools\Representation\Namespaced;
use OpenAPITools\Representation\Operation;
use OpenAPITools\Representation\Parameter;
use OpenAPITools\Representation\Path;
use OpenAPITools\Representation\Property;
use OpenAPITools\Representation\Property\Type;
use OpenAPITools\Representation\Representation;
use OpenAPITools\Representation\Schema;
use OpenAPITools\Representation\WebHook;
use OpenAPITools\Representation\WebHookEvent;
use OpenAPITools\Utils\Namespace_;
use PhpParser\Node\Expr\ConstFetch;
use PhpParser\Node\Name;
use PHPUnit\Framework\Attributes\Test;
use WyriHaximus\TestUtilities\TestCase;

final class RepresentationTest extends TestCase
{
    private function getNamespacedRepresentation(): \OpenAPITools\Representation\Namespaced\Representation
    {
        $exampleData    =
            new ExampleData(
                null,
                new ConstFetch(
                    new Name(
                        'NULL',
                    ),
                ),
            );
        $property       = new Property(
            'name',
            'name',
            'description',
            $exampleData,
            new Type(
                'type',
                null,
                null,
                new Type(
                    'type',
                    null,
                    null,
                    new Schema(
                        'Schema\SomeOtherDataValueObject',
                        [],
                        'Schema\Error\SomeOtherDataValueObject',
                        'Schema\ErrorAlias\SomeOtherDataValueObject',
                        'title',
                        'description',
                        [],
                        [],
                        new \cebe\openapi\spec\Schema([]),
                        false,
                        [],
                        [],
                    ),
                    false,
                ),
                false,
            ),
            false,
            [],
        );
        $schema         = new Schema(
            'Schema\SomeDataValueObject',
            [
                new Contract(
                    'Contract\SomeDataValueObject',
                    [$property],
                ),
            ],
            'Schema\Error\SomeDataValueObject',
            'Schema\ErrorAlias\SomeDataValueObject',
            'title',
            'description',
            [],
            [$property],
            new \cebe\openapi\spec\Schema([]),
            false,
            [],
            [],
        );
        $namespace      = new Namespace_('Vendor\Saus', 'Vendor\Tests\Saus');
        $representation = new Representation(
            new Client(
                null,
                [
                    new Path(
                        'Pad',
                        new Hydrator(
                            'Hydrators\SomeName',
                            'someMethodName',
                            [$schema],
                        ),
                        [
                            new Operation(
                                'Operation\VroemVroemMotherFucker',
                                'Operation\VroemVroemMotherFucker',
                                'Operator\VroemVroemMotherFucker',
                                'vroemVroemMotherFucker',
                                'vroem vroem mother fucker',
                                'vroemVroemMotherFucker',
                                null,
                                null,
                                'vroemVroemMotherFucker',
                                'vroemVroemMotherFucker',
                                'POST',
                                'vroem vroem mother fucker',
                                null,
                                '/vroem/vroem/mother/fucker',
                                [],
                                ['application/exhaust-fumes'],
                                [
                                    new Parameter(
                                        'name',
                                        'name',
                                        'description',
                                        'string',
                                        null,
                                        'query',
                                        null,
                                        $exampleData,
                                    ),
                                ],
                                [
                                    new Operation\RequestBody(
                                        'application/bezine',
                                        $schema,
                                    ),
                                ],
                                [
                                    new Operation\Response(
                                        200,
                                        'application/exhaust-fumes',
                                        'Exhaust fumes',
                                        new Type(
                                            'type',
                                            null,
                                            null,
                                            [
                                                new Type(
                                                    'type',
                                                    null,
                                                    null,
                                                    $schema,
                                                    false,
                                                ),
                                            ],
                                            false,
                                        ),
                                    ),
                                    new Operation\Response(
                                        200,
                                        'application/exhaust-fumes',
                                        'Exhaust fumes',
                                        new Type(
                                            'type',
                                            null,
                                            null,
                                            $schema,
                                            false,
                                        ),
                                    ),
                                    new Operation\Response(
                                        200,
                                        'application/exhaust-fumes',
                                        'Exhaust fumes',
                                        $schema,
                                    ),
                                ],
                                [
                                    new Operation\EmptyResponse(
                                        308,
                                        'Redirect',
                                        [
                                            new Header(
                                                'X-Fume-Composition',
                                                $schema,
                                                $exampleData,
                                            ),
                                        ],
                                    ),
                                ],
                            ),
                            new Operation(
                                'Operation\NoSummary',
                                'Operation\NoSummary',
                                'Operator\NoSummary',
                                'noSummary',
                                'no summary',
                                'noSummary',
                                null,
                                null,
                                'noSummary',
                                'noSummary',
                                'GET',
                                null,
                                null,
                                '/no/summary',
                                [],
                                [],
                                [],
                                [],
                                [],
                                [],
                            ),
                        ],
                    ),
                ],
            ),
            [
                new WebHookEvent(
                    'event.name',
                    new Hydrator(
                        'Hydrators\WebHookName',
                        'webHookMethodName',
                        [$schema],
                    ),
                    [
                        new WebHook(
                            'event.name',
                            'summary',
                            'description',
                            'operationId',
                            'https://example.com/docs',
                            [
                                new Header(
                                    'X-Event-Id',
                                    $schema,
                                    $exampleData,
                                ),
                            ],
                            ['body' => $schema],
                        ),
                    ],
                ),
            ],
            [$schema],
        );

        return $representation->namespace($namespace);
    }

    #[Test]
    public function schemaClassName(): void
    {
        $namespaced = $this->getNamespacedRepresentation();

        self::assertCount(1, $namespaced->schemas);
        self::assertSame('\Vendor\Saus\Schema\SomeDataValueObject', $namespaced->schemas[0]->className->fullyQualified->source);
        self::assertSame('\Vendor\Saus\Schema\Error\SomeDataValueObject', $namespaced->schemas[0]->errorClassName->fullyQualified->source);
        self::assertSame('\Vendor\Saus\Schema\ErrorAlias\SomeDataValueObject', $namespaced->schemas[0]->errorClassNameAliased->fullyQualified->source);
    }

    #[Test]
    public function schemaContractClassName(): void
    {
        $namespaced = $this->getNamespacedRepresentation();

        self::assertCount(1, $namespaced->schemas[0]->contracts);
        self::assertSame('\Vendor\Saus\Contract\SomeDataValueObject', $namespaced->schemas[0]->contracts[0]->className->fullyQualified->source);
    }

    #[Test]
    public function schemaContractProperty(): void
    {
        $namespaced = $this->getNamespacedRepresentation();

        self::assertCount(1, $namespaced->schemas[0]->contracts[0]->properties);
        self::assertInstanceOf(Namespaced\Property\Type::class, $namespaced->schemas[0]->contracts[0]->properties[0]->type->payload);
        self::assertInstanceOf(Namespaced\Schema::class, $namespaced->schemas[0]->contracts[0]->properties[0]->type->payload->payload);
        self::assertSame('\Vendor\Saus\Schema\SomeOtherDataValueObject', $namespaced->schemas[0]->contracts[0]->properties[0]->type->payload->payload->className->fullyQualified->source);
    }

    #[Test]
    public function schemaProperty(): void
    {
        $namespaced = $this->getNamespacedRepresentation();

        self::assertCount(1, $namespaced->schemas[0]->properties);
        self::assertInstanceOf(Namespaced\Property\Type::class, $namespaced->schemas[0]->properties[0]->type->payload);
        self::assertInstanceOf(Namespaced\Schema::class, $namespaced->schemas[0]->properties[0]->type->payload->payload);
        self::assertSame('\Vendor\Saus\Schema\SomeOtherDataValueObject', $namespaced->schemas[0]->properties[0]->type->payload->payload->className->fullyQualified->source);
    }

    #[Test]
    public function pathHydratorClassName(): void
    {
        $namespaced = $this->getNamespacedRepresentation();

        self::assertCount(1, $namespaced->client->paths);
        self::assertSame('\Vendor\Saus\Hydrators\SomeName', $namespaced->client->paths[0]->hydrator->className->fullyQualified->source);
        self::assertSame('\Vendor\Tests\Saus\Hydrators\SomeName', $namespaced->client->paths[0]->hydrator->className->fullyQualified->test);
    }

    #[Test]
    public function pathHydratorSchemaClassName(): void
    {
        $namespaced = $this->getNamespacedRepresentation();

        self::assertCount(1, $namespaced->client->paths[0]->hydrator->schemas);
        self::assertSame('\Vendor\Saus\Schema\SomeDataValueObject', $namespaced->client->paths[0]->hydrator->schemas[0]->className->fullyQualified->source);
    }

    #[Test]
    public function operationSummary(): void
    {
        $namespaced = $this->getNamespacedRepresentation();

        self::assertSame('vroem vroem mother fucker', $namespaced->client->paths[0]->operations[0]->summary);
        self::assertNull($namespaced->client->paths[0]->operations[1]->summary);
    }

    #[Test]
    public function operationClassName(): void
    {
        $namespaced = $this->getNamespacedRepresentation();

        self::assertSame('\Vendor\Saus\Operation\VroemVroemMotherFucker', $namespaced->client->paths[0]->operations[0]->className->fullyQualified->source);
        self::assertSame('\Vendor\Saus\Operation\VroemVroemMotherFucker', $namespaced->client->paths[0]->operations[0]->classNameSanitized->fullyQualified->source);
        self::assertSame('\Vendor\Saus\Operator\VroemVroemMotherFucker', $namespaced->client->paths[0]->operations[0]->operatorClassName->fullyQualified->source);
    }

    #[Test]
    public function operationRequestBodyClassName(): void
    {
        $namespaced = $this->getNamespacedRepresentation();

        self::assertCount(1, $namespaced->client->paths[0]->operations[0]->requestBody);
        self::assertSame('\Vendor\Saus\Schema\SomeDataValueObject', $namespaced->client->paths[0]->operations[0]->requestBody[0]->schema->className->fullyQualified->source);
    }

    #[Test]
    public function operationResponseClassName(): void
    {
        $namespaced = $this->getNamespacedRepresentation();

        self::assertCount(3, $namespaced->client->paths[0]->operations[0]->response);

        self::assertInstanceOf(Namespaced\Property\Type::class, $namespaced->client->paths[0]->operations[0]->response[0]->content);
        self::assertIsArray($namespaced->client->paths[0]->operations[0]->response[0]->content->payload);
        self::assertCount(1, $namespaced->client->paths[0]->operations[0]->response[0]->content->payload);
        self::assertInstanceOf(Namespaced\Schema::class, $namespaced->client->paths[0]->operations[0]->response[0]->content->payload[0]->payload);
        self::assertSame('\Vendor\Saus\Schema\SomeDataValueObject', $namespaced->client->paths[0]->operations[0]->response[0]->content->payload[0]->payload->className->fullyQualified->source);

        self::assertInstanceOf(Namespaced\Property\Type::class, $namespaced->client->paths[0]->operations[0]->response[1]->content);
        self::assertInstanceOf(Namespaced\Schema::class, $namespaced->client->paths[0]->operations[0]->response[1]->content->payload);
        self::assertSame('\Vendor\Saus\Schema\SomeDataValueObject', $namespaced->client->paths[0]->operations[0]->response[1]->content->payload->className->fullyQualified->source);

        self::assertInstanceOf(Namespaced\Schema::class, $namespaced->client->paths[0]->operations[0]->response[2]->content);
        self::assertSame('\Vendor\Saus\Schema\SomeDataValueObject', $namespaced->client->paths[0]->operations[0]->response[2]->content->className->fullyQualified->source);
    }

    #[Test]
    public function operationResponseHeaderSchemaClassName(): void
    {
        $namespaced = $this->getNamespacedRepresentation();

        self::assertCount(1, $namespaced->client->paths[0]->operations[0]->empty);
        self::assertCount(1, $namespaced->client->paths[0]->operations[0]->empty[0]->headers);
        self::assertSame('\Vendor\Saus\Schema\SomeDataValueObject', $namespaced->client->paths[0]->operations[0]->empty[0]->headers[0]->schema->className->fullyQualified->source);
    }

    #[Test]
    public function webHookEvent(): void
    {
        $namespaced = $this->getNamespacedRepresentation();

        self::assertCount(1, $namespaced->webHooks);
        self::assertSame('event.name', $namespaced->webHooks[0]->event);
        self::assertSame('\Vendor\Saus\Hydrators\WebHookName', $namespaced->webHooks[0]->hydrator->className->fullyQualified->source);
        self::assertCount(1, $namespaced->webHooks[0]->webHooks);
        self::assertSame('event.name', $namespaced->webHooks[0]->webHooks[0]->event);
        self::assertSame('\Vendor\Saus\Schema\SomeDataValueObject', $namespaced->webHooks[0]->webHooks[0]->schema['body']->className->fullyQualified->source);
        self::assertSame('\Vendor\Saus\Schema\SomeDataValueObject', $namespaced->webHooks[0]->webHooks[0]->headers[0]->schema->className->fullyQualified->source);
    }

    #[Test]
    public function typeNamespaceWithStringPayload(): void
    {
        $namespace  = new Namespace_('Vendor\Saus', 'Vendor\Tests\Saus');
        $namespaced = new Type('string', null, null, 'some-payload', false)->namespace($namespace);

        self::assertSame('some-payload', $namespaced->payload);
    }
}
