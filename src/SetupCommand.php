<?php

namespace Hexters\Ladmin;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;

class SetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ladmin:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup ladmin component';

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
     * @return int
     */
    public function handle()
    {
        $this->call('vendor:publish', [
            '--tag' => 'ladmin-module, ladmin-module-assets, ladmin-module-menu, ladmin-module-vite-config, ladmin-module-route-stub',
            '--force' => true,
        ]);


        $this->info('Please wait while installing sass');
        Process::path(base_path(''))->run('npm install -D sass');

        $this->info('Please wait while installing @hexters/ladmin-vite-input');
        Process::path(base_path(''))->run('npm install -D @hexters/ladmin-vite-input');

        $this->line('');
        $this->line('----------------------------------------------------');
        $this->line('');
        $this->info('Open in Browser : ' . url('/administrator'));
        $this->line('');
        $this->info('php artisan module:npm --install');
        $this->line('');
    }
}
