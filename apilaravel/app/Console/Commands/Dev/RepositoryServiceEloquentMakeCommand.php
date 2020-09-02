<?php

namespace App\Console\Commands\Dev;


use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class RepositoryServiceEloquentMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:repository-service-eloquent';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repostory service eloquent file';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository Service Eloquent';

    /**
     * The name of model being generated.
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

        $this->input->setArgument('name', $this->model . "EloquentRepositoryService");

        if (parent::handle() === false && !$this->option('force')) {
            return false;
        }
    }

    private function setPathFile()
    {
        $this->path  = explode("\\", $this->getNameInput());
        array_pop($this->path);
        $this->path = implode("\\", $this->path);
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
        return  base_path('stubs/Repository/EloquentRepositoryService.stub');
    }
    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return  $rootNamespace . '\Services\Repository\Eloquent\\' . $this->path;
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
            ['force', null, InputOption::VALUE_NONE, 'Create the class even if the model already exists'],
        ];
    }
}
