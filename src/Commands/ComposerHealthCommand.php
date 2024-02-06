<?php

namespace Concept7\ComposerHealth\Commands;

use Illuminate\Console\Command;

class ComposerHealthCommand extends Command
{
    public $signature = 'composer-health';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
