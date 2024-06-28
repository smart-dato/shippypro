<?php

namespace SmartDato\ShippyPro;

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

    protected function defaultAuth(): ShippyProAuthenticator
    {
        return new ShippyProAuthenticator($this->authkey ?? config('shippypro.authkey'));
    }

    public function shipment(): Shipment
    {
        return new Shipment($this);
    }
}
