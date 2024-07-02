<?php

namespace SmartDato\ShippyPro\Data\Shipment;

use SmartDato\ShippyPro\Contracts\Data;

class TrackData extends Data
{
    public function __construct(
        protected string $code
    ) {
        //
    }

    public function build(): array
    {
        $params = [
            'Code' => $this->code,
        ];

        return [
            'Method' => 'GetTracking',
            'Params' => $params,
        ];
    }
}
