<?php

namespace App\Template;

class JsonParser {
    /**
     * Path of the JSON schema
     * 
     * @var string
     */
    protected $path;
    protected $name;

    /**
     * Create a new JSON Parser instance
     * 
     * @param string $path
     * @return void
     */
    public function __construct(String $path, String $name) {
        $this->path = $path;
        $this->name = $name;
        $this->exists();
    }

    /**
     * Parse the JSON file into array
     * 
     * @return array
     */
    public function parse() {
        $json = $this->get_data();
        $type = $this->get_type();
        $schema = [];

        if($type == 'schema'){
            foreach($json as $table => $columns) {
                $schema[$table] = [];
                foreach($columns as $column => $parameters) {
                    $parametersList = explode('|', $parameters);
                   $parametersList = array_map(function($parameter) {
                        return explode(':', $parameter);
                    }, $parametersList);
    
                    $schema[$table][$column] = $parametersList;
                }
    
            }
        }else if($type == 'field'){
            foreach($json as $table => $columns) {
                $schema[$table] = [];
                foreach($columns as $column => $parameters) {
                    // $parametersList = explode('|', $parameters);
                    // $parametersList = array_map(function($parameter) {
                    //     return explode(':', $parameter);
                    // }, $parametersList);
    
                    $schema[$table][$column] = $parameters;
                }
    
            }
        }

        return $schema;
    }

    /**
     * Load JSON from file
     * 
     * @return array
     */
    public function get_data() {
        $json = json_decode(file_get_contents($this->path));
        $collect_data = collect($json->data);

        $filter = $collect_data->filter(function ($value, $key) {
            return $key == $this->name;
        });

        if( $filter->isEmpty()){
            $data = $collect_data->filter(function ($value, $key) {
                return $key == 'default';
            });
        }else{
            $data = $filter;
        }
        return $data->toArray();
    }

    public function get_type() {
        $json = json_decode(file_get_contents($this->path));
        return $json->nama;
    }

    /**
     * Check if the path exists
     */
    private function exists() {
        if(!file_exists($this->path)) throw new \Exception("JSON Schema file does not exist.");
    }
}