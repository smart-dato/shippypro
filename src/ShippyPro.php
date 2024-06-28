<?php

namespace SmartDato\ShippyPro;

use Saloon\Http\Auth\BasicAuthenticator;
use Saloon\Http\Connector;
use SmartDato\ShippyPro\Resource\Shipment;

class ShippyPro extends Connector
{
    public function __construct(
        public readonly ?string $username = null,
        public readonly ?string $password = null
    ) {
    }

    public function resolveBaseUrl(): string
    {
        return config('shippypro.url');
    }

    protected function defaultAuth(): BasicAuthenticator
    {
        return new BasicAuthenticator(
            $this->username ?? config('shippypro.username'),
            $this->password ?? config('shippypro.password')
        );
    }

    public function shipment(): Shipment
    {
        return new Shipment($this);
    }
}
