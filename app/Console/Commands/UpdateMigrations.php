<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdateMigrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'main:update:migrations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Запускает миграции из каталога database/migrations/updates';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call('migrate', ['--path' => 'database/migrations/updates', '--force' => true]);
    }
}
