<?php

namespace Hexters\Ladmin\Console\Commands;

use Hexters\Laramodule\Console\Commands\BaseCommandTrait;
use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;
use Illuminate\Support\Str;

class GenerateSearchGroupCommand extends GeneratorCommand
{

    use BaseCommandTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'module:make-search';

    /**
     * The name of the console command.
     *
     * This name is used to identify the command during lazy loading.
     *
     * @var string|null
     */
    protected static $defaultName = 'module:make-search';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an group search class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Group Search';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    public function getStub()
    {
        return __DIR__ . '/stubs/gorup.search.stub';
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {

        $groupName = $this->getNameInput();
        if( in_array(substr($groupName, (strlen($groupName) - 6), strlen($groupName)), ['search', 'Search']) ) {
            $groupName = Str::of($this->getNameInput())->replace(['search', 'Search'], ['', '']);
        }
        
        $replace = [
            '{{ groupName }}' => ucwords($groupName)
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
        return $this->overiteNamespace('\Searches');
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
        ];
    }
}
