<?php

namespace App\Template\Generators;

use App\Template\JsonParser;
use App\Template\Parser\ViewTableShowParser;

/**
 * Show View Generator Class
 */
class ShowViewGenerator extends BaseGenerator
{
    /**
     * {@inheritDoc}
     */
    public function generate(string $type = 'full')
    {
        $viewPath = $this->makeDirectory(resource_path('views/admin/'.$this->modelNames['table_name']));

        $this->generateFile($viewPath.'/show.blade.php', $this->getContent('resources/views/full/show'));

        $this->command->info($this->modelNames['model_name'].' show view file generated.');
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

        if (! is_null($this->command->option('load'))) {
            $jsonParser = new JsonParser($this->command->option('load'), $this->command->argument('name'));
            $field = $jsonParser->parse();

            $replacement_table = $this->getViewTableParser($field);
            $controllerFileContent = str_replace(
                '{{ view_table }}',
                $replacement_table,
                $controllerFileContent
            );
        }

        return $controllerFileContent;
    }

    public function getViewTableParser($field)
    {
        $requestParse = new ViewTableShowParser($field);
        $arr_parse = $requestParse->parse();
        $string_parse = '';
        foreach ($arr_parse as $index => $item) {
            $string_parse .= $item;
        }

        return $string_parse;
    }
}
