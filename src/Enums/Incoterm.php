<?php

namespace SmartDato\ShippyPro\Enums;

use SmartDato\ShippyPro\Exceptions\UnknownIncotermException;

enum Incoterm: string
{
    case DeliveredAtPlace = 'DAP';
    case DeliveredDutyPaid = 'DDP';
    case ExWorks = 'EXM';

    /**
     * @throws UnknownIncotermException
     */
    public static function make(string $argument): Incoterm
    {
        try {
            return Incoterm::from(strtoupper($argument));
        } catch (\Throwable $th) {
            throw new UnknownIncotermException('Unknown incoterm');
        }
    }
}
