<?php

namespace SmartDato\ShippyPro\Requests\Monitoring;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class Ping extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '';
    }

    public function __construct()
    {
        //
    }

    protected function defaultBody(): array
    {
        return [
            'Method' => 'Ping',
            'Params' => ['_' => ''],
        ];
    }
}
