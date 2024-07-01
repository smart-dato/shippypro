<?php

namespace SmartDato\ShippyPro\Resource;

use Saloon\Http\Response;
use SmartDato\ShippyPro\Requests\Monitoring\Ping;
use SmartDato\ShippyPro\Resource;

class Monitoring extends Resource
{
    public function ping(): Response
    {
        return $this->connector->send(new Ping());
    }
}
