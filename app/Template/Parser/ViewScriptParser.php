<?php

namespace App\Template\Parser;

class ViewScriptParser
{
    /**
     * Migration schema as an array
     *
     * @var array
     */
    protected $schema;

    /**
     * Create a new Schema parser instance
     */
    public function __construct(array $schema)
    {
        $this->schema = $schema;
    }

    /**
     * Parses the schema into migration methods
     *
     * @return array
     */
    public function parse()
    {

        foreach ($this->schema as $table => $columns) {
            $tables[$table] = $this->generateMethods($columns);
        }

        return $tables[$table];
    }

    /**
     * Loops through array of columns to parse
     *
     * @return array
     */
    private function generateMethods(array $columns)
    {
        $methods = [];
        foreach ($columns as $column => $parameters) {
            $methods[] = $this->generateMethod($column, $parameters);
        }

        return $methods;
    }

    /**
     * Generates a migration method for the column
     */
    private function generateMethod(string $column, $parameters)
    {
        $baseMethod = $this->generateBaseMethod($column, $parameters);

        return $baseMethod.',';
    }

    /**
     * Generate the base method for the migration
     *
     * @param  string  $column
     * @param  string  $parameters
     * @return string
     */
    private function generateBaseMethod($column, $parameters)
    {
        return sprintf("{ data: '%s', name: '%s' }", $column, $column);
    }
}
