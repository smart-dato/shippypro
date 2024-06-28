<?php

namespace SmartDato\ShippyPro;

use Saloon\Http\Auth\BasicAuthenticator;
use Saloon\Http\Connector;
use SmartDato\ShippyPro\Resource\Shipment;

class ShippyPro extends Connector
{
    public function __construct(
        public readonly ?string $authkey = null,
    ) {
    }

    public function resolveBaseUrl(): string
    {
        return config('shippypro.url');
    }

    protected function defaultAuth(): BasicAuthenticator
    {
        return new BasicAuthenticator(
            username: $this->authkey ?? config('shippypro.authkey'), 
            password: ''
        );
    }

    public function shipment(): Shipment
    {
        return new Shipment($this);
    }
}
