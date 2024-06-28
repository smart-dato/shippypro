<?php

use Illuminate\Support\Str;
use Psr\Http\Message\RequestInterface;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\PendingRequest;
use SmartDato\ShippyPro\Data\Shipment\AddressData;
use SmartDato\ShippyPro\Data\Shipment\ParcelData;
use SmartDato\ShippyPro\Data\Shipment\ShipmentData;
use SmartDato\ShippyPro\Enums\Country;
use SmartDato\ShippyPro\Enums\Incoterm;
use SmartDato\ShippyPro\Requests\Shipment\CreateShipment;
use SmartDato\ShippyPro\Resource\Shipment;
use SmartDato\ShippyPro\ShippyPro;

beforeEach(function() {
    $to = new AddressData(
        name: 'Ole Olsen',
        company: 'Test Company',
        street1: '5130 Halford Drive',
        street2: 'Building #C. Unit 1',
        city: 'Windsor',
        zip: 'N9A6J3',
        country: Country::CANADA,
        phone: '1-519-737-9101',
        email: 'orders@test.com'
    );

    $from = new AddressData(
        name: 'Elon Solo',
        company: 'Test Company Legal Name',
        street1: 'Sample Company Street',
        street2: 'Suite 135',
        city: 'Santa Barbara',
        state: 'CA',
        zip: '93101',
        country: Country::UNITED_STATES,
        phone: '12223334444',
        email: 'contact@vendor.com',
    );

    $parcels = [new ParcelData(
        length: 12,
        width: 12,
        height: 12,
        weight: 4.5,
    )];

    $data = new ShipmentData(
        from: $from,
        to: $to,
        parcels: $parcels,
        transactionId: Str::uuid(),
        carrierName: 'DHL',
        carrierService: 'EXPRESS',
        carrierId: Str::uuid(),
        incoterm: Incoterm::DeliveredAtPlace,
    );

    $this->shipment = $data;
});

it('can create shipment', function () {
    $connector = new ShippyPro();
    $connector->withMockClient(new MockClient([
        CreateShipment::class => MockResponse::fixture('create_shipment.success'),
    ]));

    $connector->debugRequest(function (PendingRequest $pendingRequest, RequestInterface $psrRequest) {
        // expect($pendingRequest)->dd();
        // expect($psrRequest)->dd();
    });

    $response = (new Shipment($connector))
        ->create($this->shipment);

    expect($response->status())->toBe(200);
});