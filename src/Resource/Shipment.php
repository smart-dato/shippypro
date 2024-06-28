<?php

namespace SmartDato\ShippyPro\Resource;

use Saloon\Http\Response;
use SmartDato\ShippyPro\Data\Shipment\ShipmentData;
use SmartDato\ShippyPro\Requests\Shipment\CreateShipment;
use SmartDato\ShippyPro\Resource;

class Shipment extends Resource
{
    public function create(ShipmentData $data): Response
    {
        return $this->connector->send(new CreateShipment($data));
    }
}
