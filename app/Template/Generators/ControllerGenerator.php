<?php

namespace App\Template\Generators;

use App\Template\Parser\SchemaParser;
use App\Template\Parser\RequestParser;
use App\Template\Parser\DBParser;
use App\Template\Parser\DatatableParser;
use App\Template\JsonParser;


/**
 * Controller Generator Class
 */
class ControllerGenerator extends BaseGenerator
{
    /**
     * {@inheritDoc}
     */
    public function generate(string $type = 'full')
    {
        $modelName = $this->modelNames['model_name'];
        $parentControllerDirectory = '';
        if (!is_null($this->command->option('parent'))) {
            $parentControllerDirectory = '/'.$this->command->option('parent');
        }

        if ($this->isForApi()) {
            $parentControllerDirectory = '/Api'.$parentControllerDirectory;
        }

        $controllerPath = $this->makeDirectory(app_path('Http/Controllers'.$parentControllerDirectory));
        $controllerPath = $controllerPath.'/'.$modelName.'Controller.php';

        $this->generateFile($controllerPath, $this->getContent('controllers/'.$type));

        if ($this->isForApi()) {
            $modelName = 'Api/'.$modelName;
        }

        $this->command->info($modelName.'Controller generated.');
    }

    /**
     * {@inheritDoc}
     */
    public function getContent(string $stubName)
    {
        if ($this->command->option('form-requests')) {
            $stubName .= '-formrequests';
        }

        $stub = $this->getStubFileContent($stubName);

        $controllerFileContent = $this->replaceStubString($stub);

        $appNamespace = $this->getAppNamespace();

        $controllerFileContent = str_replace(
            ["App\Http\Controllers", "App\Http\Requests"],
            ["{$appNamespace}Http\Controllers", "{$appNamespace}Http\Requests"],
            $controllerFileContent
        );

        if (!is_null($parentName = $this->command->option('parent'))) {
            $searches = [
                "{$appNamespace}Http\Controllers",
                "use {$this->modelNames['full_model_name']};",
            ];

            $replacements = [
                "{$appNamespace}Http\Controllers\\{$parentName}",
                "use {$this->modelNames['full_model_name']};\nuse {$appNamespace}Http\Controllers\Controller;",
            ];

            $controllerFileContent = str_replace(
                $searches,
                $replacements,
                $controllerFileContent
            );
        }

        if (!is_null($this->command->option('load'))) {
            $jsonParser = new JsonParser($this->command->option('load'), $this->command->argument('name'));
            $field = $jsonParser->parse();

            $replacement_field = $this->getRequestParser($field);
            $controllerFileContent = str_replace(
                '{{ field_request }}',
                $replacement_field,
                $controllerFileContent
            );

            $replacement_db = $this->getDBParser($field);
            $controllerFileContent = str_replace(
                '{{ field_db }}',
                $replacement_db,
                $controllerFileContent
            );

            $replacement_datatable = $this->getDatatableParser($field);
            $controllerFileContent = str_replace(
                '{{ field_datatable }}',
                $replacement_datatable,
                $controllerFileContent
            );

        }

        return $controllerFileContent;
    }

    public function  getRequestParser($field) 
    {
        $requestParse = new RequestParser($field);
        $arr_parse = $requestParse->parse();
        $string_parse = "";
        foreach($arr_parse as $index => $item) {
            $string_parse .=$item."\n\t\t\t";
        }

        return $string_parse;
    }

    public function getDBParser($field) 
    {
        $dbParse = new DBParser($field);
        $arr_dbparse = $dbParse->parse();
        $string_dbparse = "";
        foreach($arr_dbparse as $index => $item) {
            $string_dbparse .=$item."\n\t\t\t\t";
        }

        return $string_dbparse;
    }

    public function getDatatableParser($field) 
    {
        $datatableParse = new DatatableParser($field);
        $arr_datatableparse = $datatableParse->parse();
        $string_datatableparse = "";
        foreach($arr_datatableparse as $index => $item) {
            $string_datatableparse .=$item."\n\t\t\t\t\t";
        }
        return $string_datatableparse;
    }
    

    
}
