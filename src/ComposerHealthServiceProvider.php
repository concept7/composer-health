<?php

namespace Concept7\ComposerHealth;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Concept7\ComposerHealth\Commands\ComposerHealthCommand;

class ComposerHealthServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('composer-health')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_composer-health_table')
            ->hasCommand(ComposerHealthCommand::class);
    }
}
