<?php

namespace App\Template\Parser;

class ViewScriptDomParser {
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
        
        return $baseMethod . ';';
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
        
        $arr_ignore = array("select2_option", "date", "editor", "currency", "upload_file", "upload_image");

        if(! in_array($type, $arr_ignore)){
            return sprintf("$('"."#form-edit #%s').val(data.%s)",  $column, $column);
        }else{
            return "";
        }

    }
    
}