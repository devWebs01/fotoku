<?php

namespace App\Template\Generators;

use App\Template\JsonParser;
use App\Template\Parser\ViewInputParser;
use App\Template\Parser\ViewScriptDomParser;
use App\Template\Parser\ViewScriptParser;
use App\Template\Parser\ViewTableParser;

/**
 * Index View Generator Class
 */
class IndexViewGenerator extends BaseGenerator
{
    /**
     * {@inheritDoc}
     */
    public function generate(string $type = 'full')
    {
        $viewPath = $this->makeDirectory(resource_path('views/admin/'.$this->modelNames['table_name']));

        $this->generateFile($viewPath.'/index.blade.php', $this->getContent('resources/views/'.$type.'/index'));
        $this->generateFile($viewPath.'/script.blade.php', $this->getContent('resources/views/'.$type.'/script'));

        $this->command->info($this->modelNames['model_name'].' index view file generated.');
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

            $replacement_script = $this->getViewScriptParser($field);
            $controllerFileContent = str_replace(
                '{{ view_script }}',
                $replacement_script,
                $controllerFileContent
            );

            $replacement_table = $this->getViewInputParser($field);
            $controllerFileContent = str_replace(
                '{{ view_input }}',
                $replacement_table,
                $controllerFileContent
            );

            $replacement_table = $this->getScriptDOMParser($field);
            $controllerFileContent = str_replace(
                '{{ view_script_dom }}',
                $replacement_table,
                $controllerFileContent
            );

        }

        return $controllerFileContent;
    }

    public function getViewTableParser($field)
    {
        $requestParse = new ViewTableParser($field);
        $arr_parse = $requestParse->parse();
        $string_parse = '';
        foreach ($arr_parse as $index => $item) {
            $string_parse .= $item;
        }

        return $string_parse;
    }

    public function getViewScriptParser($field)
    {
        $requestParse = new ViewScriptParser($field);
        $arr_parse = $requestParse->parse();
        $string_parse = '';
        foreach ($arr_parse as $index => $item) {
            $string_parse .= "\t\t\t".$item."\n";
        }

        return $string_parse;
    }

    public function getViewInputParser($field)
    {
        $requestParse = new ViewInputParser($field);
        $arr_parse = $requestParse->parse();
        $string_parse = '';
        foreach ($arr_parse as $index => $item) {
            $string_parse .= $item."\n";
        }

        return $string_parse;
    }

    public function getScriptDOMParser($field)
    {
        $requestParse = new ViewScriptDomParser($field);
        $arr_parse = $requestParse->parse();
        $string_parse = '';
        foreach ($arr_parse as $index => $item) {
            $string_parse .= $item."\n";
        }

        return $string_parse;
    }
}
