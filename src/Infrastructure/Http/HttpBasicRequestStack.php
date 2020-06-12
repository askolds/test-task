<?php
declare(strict_types=1);

namespace Askolds\Infrastructure\Http;


use Askolds\Domain\DataContracts\HttpBasicRequestStackInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;

class HttpBasicRequestStack implements HttpBasicRequestStackInterface
{

    /** @var ClientInterface */
    private $client;
    /** @var RequestFactoryInterface */
    private $requestFactory;

    public function __construct(ClientInterface $client, RequestFactoryInterface $requestFactory)
    {

        $this->client = $client;
        $this->requestFactory = $requestFactory;
    }

    /**
     * @inheritDoc
     */
    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    /**
     * @inheritDoc
     */
    public function getRequestFactory(): RequestFactoryInterface
    {
        return $this->requestFactory;
    }
}