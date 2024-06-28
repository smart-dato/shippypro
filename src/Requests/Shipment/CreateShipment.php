<?php

namespace SmartDato\ShippyPro\Requests\Shipment;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use SmartDato\ShippyPro\Data\Shipment\ShipmentData;

/**
 * ImportShipment
 *
 * This endpoint creates a shipment in Mercury and generates an Amazon Shipping label for the final
 * mile delivery.
 */
class CreateShipment extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '';
    }

    public function __construct(
        protected ShipmentData $shipment
    ) {
    }

    protected function defaultBody(): array
    {
        return $this->shipment->build();
    }
}
