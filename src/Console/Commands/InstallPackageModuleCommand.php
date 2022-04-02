<?php

namespace Hexters\Ladmin\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InstallPackageModuleCommand extends Command
{

    protected $name;
    protected $provider;
    protected $namespace;
    protected $composer_json;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:publish {package}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish your custom package to ppmarket.org | packagist.org | github.com';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $package = $this->argument('package');

        if (!is_dir(module_path($package))) {
            $this->error('Module does not exist!');
            exit;
        }

        $currentUser = ucwords(get_current_user());
        $packageName = "{$currentUser}/$package";
        $email = env('MAIL_FROM_ADDRESS', 'example@mail.com');
        $authorDefault = "{$currentUser} <$email>";

        $packageNameLower = Str::of($packageName)->lower();

        $this->line('');
        $this->line('This command will guide you through creating your Ladmin Module.');

        $this->name = $this->ask("Package Name:", $packageNameLower);

        $namespace = [];
        foreach (explode('/', $this->name) as $name) {
            $namespace[] = ucwords(Str::of($name)->camel());
        }
        $this->namespace = implode('\\', $namespace) . '\\';

        $description = $this->ask('Description: ');

        $author = $this->ask('Author:', $authorDefault);
        preg_match_all('!(.*?)\s+<\s*(.*?)\s*>!', $author, $matches);
        $authors = [];
        for ($i = 0; $i < count($matches[0]); $i++) {
            $authors[] = array(
                'name' => $matches[1][$i],
                'email' => $matches[2][$i],
            );
        }
        $keywords = $this->ask('Keywords:', 'Laravel, Ladmin Package');

        $license = $this->ask('License:', 'MIT');

        $composer['name'] = $this->name;
        $composer['type'] = 'library';
        if (isset($description)) {
            $composer['description'] = $description;
        }
        if (isset($license)) {
            $composer['license'] = $license;
        }
        if (isset($keywords)) {
            $composer['keywords'] = array_map(fn ($keyword) => $this->mappingKeywords($keyword), explode(',', $keywords));
        }
        if (count($authors) > 0) {
            $composer['authors'] = $authors;
        }

        $composer['autoload'] = [
            'psr-4' => [
                $this->namespace => 'src/',
            ]
        ];

        $this->provider = $this->namespace . ucwords($package) . "ServiceProvider";
        $composer['extra'] = [
            'laravel' => [
                'providers' => [
                    $this->provider,
                ],
                'aliases' => []
            ]
        ];

        $composer['require'] = (object) [];

        $this->composer_json = json_encode($composer, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

        $this->line(
            $this->composer_json
        );

        $correct = $this->ask('Do you confirm generation', 'yes');

        if (in_array($correct, ['Yes', 'yes', 'YES', 'y', 'Y'])) {

            $this->info('Generating package...');
            $this->line('');
            $nodeModules = base_path('Modules' . DIRECTORY_SEPARATOR . $package . DIRECTORY_SEPARATOR . 'node_modules');

            if (is_dir($nodeModules)) {
                $this->error('Please delete the ' . $nodeModules . ' folder first and try again...');
                exit();
            }

            $this->createModule($package);
        }
    }

    /**
     * Remove space in keywords
     *
     * @param String $keyword
     * @return string
     */
    protected function mappingKeywords($keyword)
    {
        return trim($keyword);
    }

    /**
     * Create module
     *
     * @param string $package
     * @return void
     */
    protected function createModule($package)
    {

        $folders = [
            'stubs',
            'src',
        ];

        $moduleDirectory = base_path('ladmin-packages');
        if (!is_dir($moduleDirectory)) {
            File::makeDirectory($moduleDirectory);
        }

        $dirs = explode('/', rtrim($this->name, '/'));

        $moduleDirectory = $moduleDirectory . DIRECTORY_SEPARATOR . strtolower(($dirs[0] ?? ''));

        if (!is_dir($moduleDirectory)) {
            File::makeDirectory($moduleDirectory);
        }

        foreach ($dirs as $index => $dir) {
            if ($index > 0) {

                $moduleDirectory = $moduleDirectory . DIRECTORY_SEPARATOR . strtolower($dir);
                if (!is_dir($moduleDirectory)) {
                    if (File::makeDirectory($moduleDirectory)) {
                        $moduleDirectory = $moduleDirectory;
                    }
                } else {
                    $this->error('Package already exists');
                    exit();
                }
            }
        }


        foreach ($folders as $folder) {
            File::makeDirectory($moduleDirectory . DIRECTORY_SEPARATOR . $folder);
        }

        file_put_contents($moduleDirectory . '/src/' . $this->providerName($package) . '.php', $this->contentProvider($package));
        file_put_contents($moduleDirectory . DIRECTORY_SEPARATOR . 'composer.json', $this->composer_json);
        file_put_contents($moduleDirectory . DIRECTORY_SEPARATOR . '.gitignore', 'vendor/\n*.lock');
        file_put_contents($moduleDirectory . DIRECTORY_SEPARATOR . 'README.md', $this->contentReadme($package));


        $targetPackage = $moduleDirectory . DIRECTORY_SEPARATOR . 'stubs' . DIRECTORY_SEPARATOR . $package;
        File::copyDirectory(base_path('Modules/' . $package), $targetPackage);

        $this->info('# Package generated successfully.');
        $this->line('');
        $this->line('-------------------------------------------------------------------');
        $this->line('If you need other packages you can start installing them by:');
        $this->line('');
        $this->info('cd ' . $moduleDirectory);
        $this->line('e.g: composer require laravel/horizon');
        $this->line('-------------------------------------------------------------------');
        $this->line('');
        $this->line('Upload your repository to github or gitlab.');
        $this->line('');
        $this->info('Sell your package at https://ppmarket.org/developers or you can share it for free at https://packagist.org');
        $this->line('');
    }

    /**
     * Get service provider name
     *
     * @param string $package
     * @return string
     */
    protected function providerName($package)
    {
        return ucwords($package) . "ServiceProvider";
    }

    /**
     * Content of service provider
     *
     * @param string $package
     * @return string
     */
    protected function contentProvider($package)
    {
        $stub = file_get_contents(__DIR__ . '/stubs/publisn.provider.stub');
        return str_replace([
            '{{ namespace }}',
            '{{ moduleName }}',
            '{{ moduleNameLower }}',
            '{{ className }}',
        ], [
            rtrim($this->namespace, '\\'),
            $package,
            Str::of($package)->lower(),
            $this->providerName($package),
        ], $stub);
    }

    /**
     * Content of README.md
     *
     * @param string $package
     * @return string
     */
    protected function contentReadme($package)
    {
        $stub = file_get_contents(__DIR__ . '/stubs/publish.readme.stub');
        return str_replace([
            '{{ moduleTitle }}',
            '{{ moduleName }}',
            '{{ name }}'
        ], [
            ucwords($package),
            $this->name,
            strtolower($package),
        ], $stub);
    }
}
