<?php

namespace App\Template\Parser;

class RequestParser {
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
        
        return $baseMethod . ',';
    }

    /**
     * Generate the base method for the migration
     * 
     * @param string $column
     * @param string $parameters
     * @return string
     */
    private function generateBaseMethod($column, $parameters) {
       
        $arr_parameters = collect($parameters)->toArray();
        $customParameters = "";
        $no=1;
        foreach($arr_parameters as $k => $parameter) {
            $parameter = $this->getStringParam($parameter);

            if($no == count($arr_parameters)){
                $customParameters .="'".$parameter."'";
            }else{
                $customParameters .="'".$parameter."',";
            }
            $no++;
        }
        return sprintf("'%s' => [%s]",  $column, $customParameters);
    }
    
    public function getStringParam ($parameter) 
    {
        $arr_text = array("text", "currency", "textarea", "select2", "select2_option", "date", "editor");
            
        if(in_array($parameter, $arr_text)){
            $parameter= 'string';
        }else if($parameter == 'number' || $parameter == 'double'){
            $parameter= 'numeric';
        }else if($parameter == 'upload_image'){
            $parameter= 'mimes:jpg,bmp,png';
        }else if($parameter == 'upload_file'){
            $parameter= 'mimes:pdf';
        }

        return $parameter;
        
    }
    
    
}