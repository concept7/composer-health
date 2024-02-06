<?php

namespace Concept7\ComposerHealth\Checks;

use Illuminate\Support\Facades\Process;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Illuminate\Support\Arr;

class OutdatedCheck extends Check
{
    public function run(): Result
    {
        $result = Process::run('composer outdated -D --no-dev --format=json');

        $outdated = collect(Arr::get(json_decode($result->output(), true), 'installed'));

        if ($outdated->isEmpty()) {
            return Result::make('No outdated packages found')->ok();
        }

        $packageNames = $outdated
            ->pluck('name')
            ->map(fn (string $packageName) => "`{$packageName}`")
            ->join(', ', ' and ');

        return Result::make()
            ->meta($outdated->toArray())
            ->failed("Outdated packages found {$packageNames}");
    }
}
