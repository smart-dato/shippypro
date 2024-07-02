<?php

use SmartDato\ShippyPro\Data\Shipment\AddressData;
use SmartDato\ShippyPro\Data\Shipment\ContentInformationData;
use SmartDato\ShippyPro\Data\Shipment\ParcelData;
use SmartDato\ShippyPro\Data\Shipment\ShipmentData;
use SmartDato\ShippyPro\Enums\Country;
use SmartDato\ShippyPro\Enums\Incoterm;
use SmartDato\ShippyPro\Exceptions\UnknownIncotermException;

it('can create a parcel', function () {
    $faker = fake('gb');

    $parcel = new ParcelData(
        length: $faker->randomDigit(),
        width: $faker->randomDigit(),
        height: $faker->randomDigit(),
        weight: $faker->randomFloat(),
    );

    expect($parcel->build())->toBeArray();
});

it('can create an address', function () {
    $faker = fake('gb');

    $address = new AddressData(
        name: $faker->name(),
        company: $faker->company(),
        street1: $faker->streetAddress(),
        city: $faker->city(),
        zip: $faker->postcode(),
        country: Country::ITALY,
        phone: $faker->phoneNumber(),
        email: $faker->email(),
    );

    expect($address->build())->toBeArray();
});

it('can create a content information', function () {
    $faker = fake('gb');

    $contentInformation = new ContentInformationData(
        description: $faker->text(20),
        weight: $faker->randomFloat(),
        quantity: $faker->randomDigit(),
        unitValue: $faker->randomFloat(),
        hsCode: $faker->uuid(),
    );

    expect($contentInformation->build())->toBeArray();
});

it('can create a shipment', function () {
    $faker = fake('gb');

    $to = new AddressData(
        name: $faker->name(),
        company: $faker->company(),
        street1: $faker->streetAddress(),
        city: $faker->city(),
        zip: $faker->postcode(),
        country: Country::ITALY,
        phone: $faker->phoneNumber(),
        email: $faker->email(),
    );

    $from = new AddressData(
        name: $faker->name(),
        company: $faker->company(),
        street1: $faker->streetAddress(),
        city: $faker->city(),
        zip: $faker->postcode(),
        country: Country::ITALY,
        phone: $faker->phoneNumber(),
        email: $faker->email(),
    );

    $parcels = [new ParcelData(
        length: $faker->randomDigitNotNull(),
        width: $faker->randomDigitNotNull(),
        height: $faker->randomDigitNotNull(),
        weight: $faker->randomFloat(),
    )];

    $contentInformation = [new ContentInformationData(
        description: $faker->text(20),
        weight: $faker->randomFloat(),
        quantity: $faker->randomDigit(),
        unitValue: $faker->randomFloat(),
        hsCode: $faker->uuid(),
    )];

    $shipment = new ShipmentData(
        from: $from,
        to: $to,
        parcels: $parcels,
        transactionId: $faker->uuid(),
        carrierName: $faker->company(),
        carrierService: strtoupper($faker->text(5)),
        carrierId: $faker->uuid(),
        incoterm: Incoterm::DeliveredDutyPaid,
        contentInformation: $contentInformation,
    );

    // expect($shipment->build())->dd();
    expect($shipment->build())->toBeArray();

    expect(function () use ($faker, $from, $to, $parcels) {
        new ShipmentData(
            from: $from,
            to: $to,
            parcels: $parcels,
            transactionId: $faker->uuid(),
            carrierName: $faker->company(),
            carrierService: strtoupper($faker->text(5)),
            carrierId: $faker->uuid(),
            incoterm: Incoterm::make('FAKE_INCOTERM'),
        );
    })->toThrow(UnknownIncotermException::class);
});
