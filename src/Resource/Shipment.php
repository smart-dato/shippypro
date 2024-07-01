<?php

namespace SmartDato\ShippyPro\Resource;

use Saloon\Http\Response;
use SmartDato\ShippyPro\Data\Shipment\ShipmentData;
use SmartDato\ShippyPro\Data\Shipment\TrackData;
use SmartDato\ShippyPro\Requests\Shipment\CreateShipment;
use SmartDato\ShippyPro\Requests\Shipment\TrackShipment;
use SmartDato\ShippyPro\Resource;

class Shipment extends Resource
{
    public function create(ShipmentData $data): Response
    {
        return $this->connector->send(new CreateShipment($data));
    }

    public function track(TrackData $data): Response
    {
        return $this->connector->send(new TrackShipment($data));
    }
}
