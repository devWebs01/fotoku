<?php

namespace App\Template\Parser;

class ViewInputParser {
    /**
     * Migration schema as an array
     * 
     * @var array
     */
    protected $schema;

    /**
     * Create a new Schema parser instance
     * 
     * @param array $schema
     */
    public function __construct(Array $schema) {
        $this->schema = $schema;
    }

    /**
     * Parses the schema into migration methods
     * 
     * @return array
     */
    public function parse() {
       
        foreach($this->schema as $table => $columns) {
            $tables[$table] = $this->generateMethods($columns);
        }

        return $tables[$table];
    }

    /**
     * Loops through array of columns to parse
     * 
     * @return array
     */
    private function generateMethods(Array $columns) {
        $methods = [];
        foreach($columns as $column => $parameters) {
            $methods[] = $this->generateMethod($column, $parameters);
        }
        return $methods;
    }
    
    /**
     * Generates a migration method for the column
     */
    private function generateMethod(String $column, $parameters) {
        $baseMethod = $this->generateBaseMethod($column, $parameters );
        
        return $baseMethod . '';
    }

    /**
     * Generate the base method for the migration
     * 
     * @param string $column
     * @param string $parameters
     * @return string
     */
    private function generateBaseMethod($column, $parameters) {
        $type = collect($parameters)->get('type');
        $arr_parameters = collect($parameters)->toArray();
        $customString = "";
        foreach($arr_parameters as $k => $parameter) {
            $filter = array("type");
            if(! in_array($k, $filter)){
                $customString .="".$parameter."='".$parameter."'";
            }
        }
        return $this->getTemplateType($type, $customString, $column);
    }

    public function getTemplateType ($type, $customString, $column) 
    {
        switch ($type) {
            case 'text':
                $template = sprintf("<x-form-input id='%s' text='%s' %s />", $column, $column, $customString);
                break;
            
            case 'number':
                $template = sprintf("<x-form-number id='%s' text='%s' type='number' %s />", $column, $column, $customString);
                break;
            
            case 'double':
                $template = sprintf("<x-form-number id='%s' text='%s' type='number' step='0.1' %s />", $column, $column, $customString);
                break;
            
            case 'currency':
                $template = sprintf("<x-form-input-rupiah id='%s' text='%s' %s />", $column, $column, $customString);
                break;
            
            case 'textarea':
                $template = sprintf("<x-form-textarea id='%s' text='%s' %s />", $column, $column, $customString);
                break;
            
            case 'editor':
                $template = sprintf("<div  id='editor'></div>");
                break;
            
            case 'date':
                $template = sprintf("<x-form-date id='%s' text='%s' addClass='dmy' %s />", $column, $column, $customString);
                break;
            
            case 'upload_file':
                $template = sprintf("<x-form-input-file id='%s' text='%s' type='file' addClass='upload_file' %s />", $column, $column, $customString);
                break;
            
            case 'upload_gambar':
                $template = sprintf("<x-form-input-file id='%s' text='%s' type='file' addClass='upload_gambar' %s />", $column, $column, $customString);
                break;
            
            case 'select2':
                $template = sprintf("<x-form-select2 id='%s' text='%s' %s > </x-form-select2>", $column, $column, $customString);
                break;
            
            case 'select2_option':
                $template = sprintf("<x-form-select2-option id='%s' text='%s' kolom='%s' :array='$"."select' %s />", $column, $column, $column, $customString);
                break;
            
            default:
                $template = sprintf("<x-form-input id='%s' text='%s' %s />", $column, $column, $customString);
                break;
        }

        return $template;
    }
    
    
}