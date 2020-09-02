<?php

namespace App\Console\Commands\Dev;


use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class RepositoryInterfaceMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:repository-interface';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repostory interface file';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository Interface';

    /**
     * The name of class being generated.
     *
     * @var string
     */
    private $model;

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->model = class_basename($this->getNameInput());
        $this->setPathFile();

        $this->input->setArgument('name', $this->model . "RepositoryInterface");

        if (parent::handle() === false && !$this->option('force')) {
            return false;
        }

        if ($this->option('all')) {
            $this->input->setOption('repository-eloquent', true);
            $this->input->setOption('repository-service-interface', true);
            $this->input->setOption('repository-service-eloquent', true);
        }

        if ($this->option('repository-eloquent')) {
            $this->createRepositoryEloquent();
        }

        if ($this->option('repository-service-interface')) {
            $this->createRepositoryServiceInterface();
        }

        if ($this->option('repository-service-eloquent')) {
            $this->createRepositoryServiceEloquent();
        }
    }

    private function setPathFile()
    {
        $this->path  = explode("\\", $this->getNameInput());
        array_pop($this->path);
        $this->path = implode("\\", $this->path);
    }


    /**
     * Create a model factory for the model.
     *
     * @return void
     */
    protected function createRepositoryEloquent()
    {
        $this->call('make:repository-eloquent', [
            'name' => sprintf('%s\%s', $this->path, $this->model),
        ]);
    }

    /**
     * Create a migration file for the model.
     *
     * @return void
     */
    protected function createRepositoryServiceInterface()
    {
        $this->call('make:repository-service-interface', [
            'name' => sprintf('%s\%s', $this->path, $this->model),
        ]);
    }

    /**
     * Create a migration file for the model.
     *
     * @return void
     */
    protected function createRepositoryServiceEloquent()
    {
        $this->call('make:repository-service-eloquent', [
            'name' => sprintf('%s\%s', $this->path, $this->model),
        ]);
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $stub = parent::replaceClass($stub, $name);
        $path = !empty($this->path) ? "\\" . $this->path : "";

        return str_replace(array('{{model}}', '{{path}}'), array($this->model, $path), $stub);
    }

    /**
     * 
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return  base_path('stubs/Repository/RepositoryInterface.stub');
    }
    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Repository\Contracts\\' . $this->path;
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the model class.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['all', 'a', InputOption::VALUE_NONE, 'Generate a repository eloquent, repository service interface and repository service eloquent for the model'],
            ['repository-eloquent', 're', InputOption::VALUE_NONE, 'Create a new repository eloquent for the model'],
            ['force', null, InputOption::VALUE_NONE, 'Create the class even if the model already exists'],
            ['repository-service-interface', 'rsi', InputOption::VALUE_NONE, 'Create a new repository service interface for the model'],
            ['repository-service-eloquent', 'rse', InputOption::VALUE_NONE, 'Create a new repository service eloquent for the model'],
        ];
    }
}
