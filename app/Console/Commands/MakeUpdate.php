<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:update {name : The name of the migration}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make update file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return $this->call('make:migration', [
            '--path' => 'database/migrations/updates',
            'name'   => $this->input->getArgument('name'),
        ]);
    }
}
