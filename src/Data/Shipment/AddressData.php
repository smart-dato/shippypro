<?php

namespace SmartDato\ShippyPro\Data\Shipment;

use SmartDato\ShippyPro\Contracts\Data;
use SmartDato\ShippyPro\Enums\Country;

class AddressData extends Data
{
    /**
     * @param string $name 
     * @param string $company 
     * @param string $street1 
     * @param string $city 
     * @param string $zip 
     * @param Country $country 
     * @param string $phone 
     * @param string $email 
     * @param null|string $street2 
     * @param null|string $state 
     * @return void 
     */
    public function __construct(
        protected string $name,
        protected string $company,
        protected string $street1,
        protected string $city,
        protected string $zip,
        protected Country $country,
        protected string $phone,
        protected string $email,
        protected ?string $street2 = '',
        protected ?string $state = '',
    ) {
        //
    }

    public function build(): array
    {
        return [
            'name' => $this->name,
            'company' => $this->company,
            'street1' => $this->street1,
            'street2' => $this->street2,
            'city' => $this->city,
            'zip' => $this->zip,
            'state' => $this->state,
            'country' => $this->country->value,
            'phone' => $this->phone,
            'email' => $this->email,
        ];
    }
}
