<?php

namespace SmartDato\ShippyPro;

use Saloon\Contracts\Authenticator;
use Saloon\Http\PendingRequest;

class ShippyProAuthenticator implements Authenticator
{
    public function __construct(public readonly string $key) {}

    public function set(PendingRequest $pendingRequest): void
    {
        $pendingRequest->body()->set([
            'auth' => [$this->key, ''],
            'json' => $pendingRequest->body()->all()
        ]);
    }
}