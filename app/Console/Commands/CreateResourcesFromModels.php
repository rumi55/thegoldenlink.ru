<?php

namespace App\Console\Commands;

use Illuminate\Console\Application as Artisan;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Symfony\Component\Finder\Finder;

class CreateResourcesFromModels extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'main:resources';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create filament resources from models';

    protected array $except = [
        'Permission',
        'EventPayment',
        'EventClass',
    ];

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->runFor(app_path('Models'));

        return 0;
    }

    protected function runFor($paths)
    {
        $paths = array_unique(Arr::wrap($paths));

        $paths = array_filter($paths, function ($path) {
            return is_dir($path);
        });

        if (empty($paths)) {
            return;
        }

        foreach ((new Finder())->in($paths)->depth(0)->files() as $command) {
            $name = str_replace('.' . $command->getExtension(), '', $command->getBasename());

            if (in_array($name, $this->except)) {
                continue;
            }

            if (file_exists(app_path("Filament/Resources/{$name}Resource.php"))) {
                continue;
            }

            $this->comment($name);
            $this->call('make:filament-resource', ['--generate' => true, 'name' => $name]);
        }
    }
}
