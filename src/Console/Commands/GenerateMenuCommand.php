<?php

namespace Hexters\Ladmin\Console\Commands;

use Hexters\Laramodule\Console\Commands\BaseCommandTrait;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;

class GenerateMenuCommand extends GeneratorCommand
{

    use BaseCommandTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'module:make-menu';

    /**
     * The name of the console command.
     *
     * This name is used to identify the command during lazy loading.
     *
     * @var string|null
     */
    protected static $defaultName = 'module:make-menu';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new menu class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Menu';
    

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/menu.stub');
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
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $this->overiteNamespace('\Menus');
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['module', 'o', InputOption::VALUE_REQUIRED, 'Add existing module name.']
        ];
    }
}
