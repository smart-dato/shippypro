<?php

namespace SmartDato\ShippyPro\Data\Shipment;

use SmartDato\ShippyPro\Contracts\Data;
use SmartDato\ShippyPro\Enums\Currency;
use SmartDato\ShippyPro\Enums\Incoterm;

class ShipmentData extends Data
{
    /**
     * @param  array<ParcelData>  $parcels
     * @param  array<ContentInformationData>  $contentInformation
     * @return void
     */
    public function __construct(
        protected AddressData $from,
        protected AddressData $to,
        protected array $parcels,
        protected string $transactionId,
        protected string $carrierName,
        protected string $carrierService,
        protected string $carrierId,
        protected ?string $totalValue = '1 EUR',
        protected ?string $contentDescription = 'Good',
        protected ?int $insurance = 0,
        protected ?Currency $insuranceCurrency = Currency::Euro_Member_Countries,
        protected ?int $cashOnDelivery = 0,
        protected ?Currency $cashOnDeliveryCurrency = Currency::Euro_Member_Countries,
        protected ?int $cashOnDeliveryType = 0,
        protected ?int $shipmentAmountPaid = 1,
        protected ?int $shipmentCost = 1,
        protected ?Currency $shipmentCostCurrency = Currency::Euro_Member_Countries,
        protected ?string $orderId = '',
        protected ?string $rateId = '',
        protected ?Incoterm $incoterm = Incoterm::DeliveredAtPlace,
        protected ?string $billAccountNumber = '',
        protected ?string $paymentMethod = '',
        protected ?string $note = '',
        protected ?string $async = '',
        protected ?array $contentInformation = null,
    ) {}

    public function build(): array
    {
        $params = [
            'from_address' => $this->from->build(),
            'to_address' => $this->to->build(),
            'parcels' => array_map(fn (ParcelData $parcel) => $parcel->build(), $this->parcels),
            'TransactionID' => $this->transactionId,
            'TotalValue' => $this->totalValue,
            'ContentDescription' => $this->contentDescription,
            'Insurance' => $this->insurance,
            'InsuranceCurrency' => $this->insuranceCurrency->value,
            'CashOnDelivery' => $this->cashOnDelivery,
            'CashOnDeliveryCurrency' => $this->cashOnDeliveryCurrency->value,
            'CashOnDeliveryType' => $this->cashOnDeliveryType,
            'CarrierName' => $this->carrierName,
            'CarrierService' => $this->carrierService,
            'CarrierID' => $this->carrierId,
            'ShipmentAmountPaid' => $this->shipmentAmountPaid,
            'ShipmentCost' => $this->shipmentCost,
            'ShipmentCostCurrency' => $this->shipmentCostCurrency->value,
            'OrderID' => $this->orderId,
            'RateID' => $this->rateId,
            'Incoterm' => $this->incoterm->value,
            'BillAccountNumber' => $this->billAccountNumber,
            'PaymentMethod' => $this->paymentMethod,
            'Note' => $this->note,
            'Async' => $this->async,
        ];

        if ($this->contentInformation) {
            $params['CN22Info'] = array_map(
                fn (ContentInformationData $info) => $info->build(),
                $this->contentInformation
            );
        }

        return [
            'Method' => 'Ship',
            'Params' => $params,
        ];
    }
}
