<?php

namespace SmartDato\ShippyPro\Data\Shipment;

use SmartDato\ShippyPro\Contracts\Data;

class ParcelData extends Data
{
    public function __construct(
        protected int $length,
        protected int $width,
        protected int $height,
        protected float $weight,
    ) {
        //
    }

    public function build(): array
    {
        return [
            'length' => $this->length,
            'width' => $this->width,
            'height' => $this->height,
            'weight' => $this->weight,
        ];
    }
}

