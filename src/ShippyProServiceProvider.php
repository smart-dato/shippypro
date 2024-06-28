<?php

namespace SmartDato\ShippyPro;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use SmartDato\ShippyPro\Commands\ShippyProCommand;

class ShippyProServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('shippypro')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_shippypro_table')
            ->hasCommand(ShippyProCommand::class);
    }
}
