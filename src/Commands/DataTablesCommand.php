<?php

namespace Hexters\Ladmin\Commands;

use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Command;

class DataTablesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:datatables {class} {--model=Model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create datatables server side handle';

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
    public function handle() {
        
        $stub = base_path('/vendor/hexters/ladmin/stubs/Datatables.stub');
        if(! file_exists($stub)) {
            $this->info('Stub DataTables file not exists!');
            return;
        }

        $dir = app_path('DataTables');
        if(! is_dir($dir)) {
            mkdir($dir);
        }
        
        $template = file_get_contents($stub);

        $model = $queueName = $this->option('model');
        $class = $queueName = $this->argument('class');
        
        $path = explode('/', $class);
        $filename = $path[count($path) - 1];

        if(count($path) > 1) {
            unset($path[count($path) - 1]);

            $pathFirst = $dir;
            foreach($path as $newPath) {
                
                if(! is_dir($pathFirst . DIRECTORY_SEPARATOR . $newPath)) {
                    mkdir($pathFirst . DIRECTORY_SEPARATOR . $newPath);
                }

                $pathFirst = $pathFirst . DIRECTORY_SEPARATOR . $newPath;
            }
        }
        $namespace = 'App\\DataTables\\' . implode('\\', $path);
        $namespace = str_replace('\\' . $filename, '', $namespace);
        
        $php = str_replace('{{ namespace }}', $namespace, $template);
        $php = str_replace('{{ model }}', $model, $php);
        $php = str_replace('{{ filename }}', $filename, $php);

        $content = $dir . DIRECTORY_SEPARATOR . $class . '.php';
        try {
            
            if(file_exists($content)) {
                throw new Exception($filename . '.php already exists!');
            }
            
            file_put_contents($content, $php);
            $this->info($filename . '.php has been created');

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
        

    }
}
