<?php

namespace SmartDato\ShippyPro\Data\Shipment;

use SmartDato\ShippyPro\Contracts\Data;
use SmartDato\ShippyPro\Enums\Country;
use SmartDato\ShippyPro\Enums\Currency;

class ContentInformationData extends Data
{
    /**
     * @return void
     */
    public function __construct(
        protected string $description,
        protected float $weight,
        protected int $quantity,
        protected float $unitValue,
        protected string $hsCode,
        protected ?Country $originCountry = null,
        protected ?Currency $currency = Currency::Euro_Member_Countries,
    ) {
        //
    }

    public function build(): array
    {
        return [
            'Description' => $this->description,
            'Weight' => $this->weight,
            'Quantity' => $this->quantity,
            'UnitValue' => $this->unitValue,
            'OriginCountry' => $this->originCountry?->value ?? '',
            'HSCode' => $this->hsCode,
            'Currency' => $this->currency->value,
        ];
    }
}
