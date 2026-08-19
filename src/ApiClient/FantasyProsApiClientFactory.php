<?php

declare(strict_types=1);

namespace HansPeterOrding\FantasyProsApiClient\ApiClient;

use Http\Client\Common\Plugin\ContentTypePlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Http\Client\Common\Plugin\LoggerPlugin;
use Http\Client\Common\Plugin\RetryPlugin;
use Http\Client\Common\PluginClient;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Http\Message\Formatter\FullHttpMessageFormatter;
use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class FantasyProsApiClientFactory
{
    public function getFantasyProsApiClient(
        #[\SensitiveParameter]
        string           $apiKey,
        ?ClientInterface $client = null,
        ?LoggerInterface $logger = null,
        string           $sport = FantasyProsApiClientInterface::SPORT_NFL,
    ): FantasyProsApiClientInterface
    {
        $client = $client ?? Psr18ClientDiscovery::find();
        $uriFactory = Psr17FactoryDiscovery::findUriFactory();
        $requestFactory = Psr17FactoryDiscovery::findRequestFactory();

        $plugins = [];

        if (null !== $logger) {
            $plugins[] = new LoggerPlugin($logger, new FullHttpMessageFormatter(5000));
        }

        $plugins[] = new ContentTypePlugin();
        $plugins[] = new HeaderDefaultsPlugin([
            'Accept' => FantasyProsApiClientInterface::ACCEPT_JSON,
            'User-Agent' => FantasyProsApiClientInterface::USER_AGENT,
        ]);
        $plugins[] = new RetryPlugin([
            'retries' => 3,
        ]);

        $pluginClient = new PluginClient(
            $client,
            $plugins
        );

        return new FantasyProsApiClient(
            $pluginClient,
            $uriFactory,
            $requestFactory,
            self::createSerializer(),
            $apiKey,
            $sport,
        );
    }

    /**
     * The serializer configuration the client depends on. Public and static
     * so tests (and consumers wiring the client explicitly) can reuse the
     * exact production configuration.
     *
     * Notes on the choices:
     *  - MetadataAwareNameConverter wraps CamelCaseToSnakeCaseNameConverter:
     *    FantasyPros uses snake_case keys, but several keys cannot be derived
     *    from a property name (ECR, ECR_MIN, 2pt_tds, practice_1, ...) and
     *    are mapped via #[SerializedName]. The metadata-aware wrapper is
     *    required for those attributes to be honored.
     *  - The property-info extractors let list properties documented as
     *    "@var FpX[]|null" denormalize into typed DTO lists.
     *  - Numeric type flips (the API mixes "1", 1 and 1.0 freely, sometimes
     *    within one object) are absorbed per-property via #[Context] with
     *    DISABLE_TYPE_ENFORCEMENT on the DTOs.
     */
    public static function createSerializer(): SerializerInterface
    {
        $phpDocExtractor = new PhpDocExtractor();
        $reflectionExtractor = new ReflectionExtractor();
        $propertyInfo = new PropertyInfoExtractor(
            typeExtractors: [$phpDocExtractor, $reflectionExtractor]
        );

        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());
        $nameConverter = new MetadataAwareNameConverter(
            $classMetadataFactory,
            new CamelCaseToSnakeCaseNameConverter()
        );

        $encoders = [new JsonEncoder()];
        $normalizers = [
            new ObjectNormalizer(
                $classMetadataFactory,
                $nameConverter,
                null,
                propertyTypeExtractor: $propertyInfo
            ),
            new ArrayDenormalizer(),
        ];

        return new Serializer($normalizers, $encoders);
    }
}
