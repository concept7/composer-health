<?php

namespace Concept7\ComposerHealth\Checks;

use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;
use Illuminate\Support\Facades\Process;

class OutdatedCheck extends Check
{
    public function run(): Result
    {
        $result = Process::run("composer outdated -D --format=json");

        $outdated = collect(json_decode($result->output(), true));

        if ($outdated->isEmpty()) {
            return Result::make('No outdated packages found')->ok();
        }

        $packageNames = $outdated
            ->pluck("name")
            ->map(fn(string $packageName) => "`{$packageName}`")
            ->join(", ", " and ");

        return Result::make()
            ->meta($outdated->toArray())
            ->failed("Outdated packages found {$packageNames}");
    }
}
