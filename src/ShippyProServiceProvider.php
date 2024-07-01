<?php

namespace SmartDato\ShippyPro;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ShippyProServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('shippypro')
            ->hasConfigFile();
    }
}
