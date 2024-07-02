<?php

namespace SmartDato\ShippyPro\Requests\Shipment;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;
use SmartDato\ShippyPro\Data\Shipment\TrackData;

class TrackShipment extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '';
    }

    public function __construct(
        protected TrackData $track
    ) {}

    protected function defaultBody(): array
    {
        return $this->track->build();
    }
}
