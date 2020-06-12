<?php
declare(strict_types=1);

namespace Askolds\Domain\DataContracts;


use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;

interface HttpBasicRequestStackInterface
{
    /**
     * @return ClientInterface
     */
    public function getClient(): ClientInterface;

    /**
     * @return RequestFactoryInterface
     */
    public function getRequestFactory(): RequestFactoryInterface;
}