<?php

namespace App\Template\Generators;

use App\Template\JsonParser;
use App\Template\Parser\ViewEditParser;
use App\Template\Parser\ViewInputParser;

/**
 * Form View Generator Class
 */
class FormViewGenerator extends BaseGenerator
{
    /**
     * {@inheritDoc}
     */
    public function generate(string $type = 'full')
    {
        $viewPath = $this->makeDirectory(resource_path('views/admin/'.$this->modelNames['table_name']));

        if ($type == 'simple') {
            $this->generateFile($viewPath.'/forms.blade.php', $this->getContent('resources/views/simple/forms'));
        } else {
            $this->generateFile($viewPath.'/create.blade.php', $this->getContent('resources/views/full/create'));
            $this->generateFile($viewPath.'/edit.blade.php', $this->getContent('resources/views/full/edit'));
        }

        $this->command->info($this->modelNames['model_name'].' form view file generated.');
    }

    /**
     * {@inheritDoc}
     */
    public function getContent(string $stubName)
    {
        if ($this->command->option('formfield')) {
            $stubName .= '-formfield';
        }

        if ($this->command->option('bs3')) {
            $stubName .= '-bs3';
        }

        $stub = $this->getStubFileContent($stubName);

        $controllerFileContent = $this->replaceStubString($stub);

        if (!is_null($this->command->option('load'))) {
            $jsonParser = new JsonParser($this->command->option('load'), $this->command->argument('name'));
            $field = $jsonParser->parse();

            $replacement_table = $this->getViewInputParser($field);
            $controllerFileContent = str_replace(
                '{{ view_input }}',
                $replacement_table,
                $controllerFileContent
            );

            $replacement_table = $this->getViewEditParser($field);
            $controllerFileContent = str_replace(
                '{{ view_edit }}',
                $replacement_table,
                $controllerFileContent
            );
           
        }

        return $controllerFileContent;
    }

    public function  getViewInputParser($field) 
    {
        $requestParse = new ViewInputParser($field);
        $arr_parse = $requestParse->parse();
        $string_parse = "";
        foreach($arr_parse as $index => $item) {
            $string_parse .=$item."\n";
        }

        return $string_parse;
    }

    public function  getViewEditParser($field) 
    {
        $requestParse = new ViewEditParser($field);
        $arr_parse = $requestParse->parse();
        $string_parse = "";
        foreach($arr_parse as $index => $item) {
            $string_parse .=$item."\n";
        }

        return $string_parse;
    }
}
