<?php

namespace Laravel\Feature\Commands;

use Illuminate\Console\Command;
use Laravel\Feature\FeatureManager;

class PurgeCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'pennant:purge
                            {feature? : The feature to purge}
                            {--driver= : The driver to purge the feature from}';

    /**
     * Execute the console command.
     *
     * @param  \Laravel\Feature\FeatureManager  $manager
     * @return int
     */
    public function handle(FeatureManager $manager)
    {
        $manager->driver($this->option('driver'))->purge($this->argument('feature'));

        $name = $this->argument('feature') ?? 'All features';

        $this->components->info("{$name} successfully purged from storage.");

        return self::SUCCESS;
    }
}
