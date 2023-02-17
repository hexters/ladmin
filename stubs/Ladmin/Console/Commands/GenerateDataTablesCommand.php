<?php

namespace Modules\Ladmin\Console\Commands;

use Hexters\Laramodule\Console\Commands\BaseCommandTrait;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class GenerateDataTablesCommand extends GeneratorCommand
{

    use BaseCommandTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'module:make-datatables';

    /**
     * The name of the console command.
     *
     * This name is used to identify the command during lazy loading.
     *
     * @var string|null
     */
    protected static $defaultName = 'module:make-datatables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new DataTables class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'DataTables';


    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/datatables.stub');
    }

    /**
     * Resolve the fully-qualified path to the stub.
     *
     * @param  string  $stub
     * @return string
     */
    protected function resolveStubPath($stub)
    {
        return __DIR__ . $stub;
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {

        $replace = [
            '{{ model }}' => empty($this->option('model')) ? 'Model' : $this->option('model')
        ];

        return str_replace(array_keys($replace), array_values($replace), parent::buildClass($name));
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $this->overiteNamespace('\Datatables');
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['module', 'o', InputOption::VALUE_REQUIRED, 'Add existing module name.'],
            ['model', 'm', InputOption::VALUE_OPTIONAL, 'Add model name']
        ];
    }
}
