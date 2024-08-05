<?php

namespace App\Console\Commands;

use App\Template\GeneratorCommand;

class CreateRouteResource extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud {name : The model name}
                            {--p|parent= : The generated controller parent directory}
                            {--l|load= : The generated load data json}
                            {--t|tests-only : Generate CRUD testcases only}
                            {--f|formfield : Generate CRUD with FormField facades}
                            {--r|form-requests : Generate CRUD with Form Request on create and update actions}
                            {--bs3 : Generate CRUD with Bootstrap 3 views}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Resource Laravel CRUD files of given model name.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->getModelName();

        if ($this->modelExists()) {
            $confirm = $this->confirm('Model file exists, are you sure to generate CRUD files?');
            if (! $confirm) {
                $this->error("{$this->modelNames['model_name']} model already exists.");

                return;
            }
        }

        $this->generateRoutes();
        $this->generateModel();
        $this->generateController();
        $this->generateResources();
        $this->info('CRUD files generated successfully!');

    }

    public function generateRoutes()
    {
        app('App\Template\Generators\RouteGenerator', ['command' => $this])->generate();
    }

    public function generateModel()
    {
        app('App\Template\Generators\ModelGenerator', ['command' => $this])->generate();
    }

    public function generateController()
    {
        app('App\Template\Generators\ControllerGenerator', ['command' => $this])->generate();
    }

    public function generateResources()
    {
        app('App\Template\Generators\IndexViewGenerator', ['command' => $this])->generate();
        app('App\Template\Generators\ShowViewGenerator', ['command' => $this])->generate();
        app('App\Template\Generators\FormViewGenerator', ['command' => $this])->generate();

        // app('App\Template\Generators\FormViewGenerator', ['command' => $this])->generate('simple');
        // app('App\Template\Generators\IndexViewGenerator', ['command' => $this])->generate('simple');
    }
}
