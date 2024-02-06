<?php

namespace Concept7\ComposerHealth;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ComposerHealthServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('composer-health')
            ->hasConfigFile();
    }
}
