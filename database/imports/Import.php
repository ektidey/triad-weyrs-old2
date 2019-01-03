<?php
use Illuminate\Database\Capsule\Manager as Capsule;

abstract class Import
{
    protected static $table = null;
    protected static $mapping = null;
    protected static $prefix = null;

    /**
     * Run the import
     */
    public static function run()
    {
        $mapping = static::getMapping();

        // Get input data
        $dataFrom = Capsule::connection("from")->select("select ".
            implode(",", array_filter(array_values($mapping))).
            " from ".static::getTable("from"));
        echo "result has ".count($dataFrom)." rows\n";

        // Create array of output data
        $output = [];
        foreach ($dataFrom as $row)
        {
            foreach ($mapping as $colTo => $colFrom)
            {
                $output[$colTo] = $row->$colFrom;
            }
        }

        // Update database
        //Capsule::connection("to")->insert("")
    }

    /**
     * Get a database table. Ensures return of a non-empty string.
     * @return string
     */
    protected static function getTable($name)
    {
        $result = null;

        if (is_array(static::$table) && array_key_exists($name, static::$table))
        {
            $result = static::$table[$name];
        }
        else if (is_string(static::$table))
        {
            $result = static::$table;
        }

        if (is_string($result) === false || empty($result))
        {
            throw new Exception("Error importing data - invalid table in ".__CLASS__);
        }

        return $result;
    }

    /**
     * Get a table's column names
     * @return array
     */
    protected static function getColumns($name)
    {
        return array_map(function($row) {
            return $row->Field;
        }, Capsule::connection($name)->select("describe ".static::getTable($name)));
    }

    /**
     * Get the mapping from old to new table
     * @return array
     */
    protected static function getMapping()
    {
        if (is_null(static::$mapping) === false && is_array(static::$mapping) === false)
        {
            throw new Exception("Error importing data - invalid mapping in ".__CLASS__);
        }

        if (is_null(static::$prefix) === false && (is_string(static::$prefix) === false || empty(static::$prefix)))
        {
            throw new Exception("Error importing data - invalid prefix in ".__CLASS__);
        }

        // Get the columns for the tables
        $colsFrom = static::getColumns("from");
        $colsTo = static::getColumns("to");

        // Try to find a match for each
        $result = [];
        foreach ($colsTo as $colTo)
        {
            $colFrom = null;
            if (static::$mapping && in_array($colTo, static::$mapping))
            {
                // if there is an explicit mapping, use it
                $colFrom = static::$mapping[$colTo];
                if (array_key_exists($colFrom, $colsFrom) === false)
                {
                    throw new Exception("Column $colsFrom does not exist in ".static::getTable("from"));
                }
            }
            else if (static::$prefix)
            {
                // otherwise, see if there is a match with the prefix added
                if (in_array($col = static::$prefix.$colTo, $colsFrom))
                {
                    $colFrom = $col;
                }
                else if (($colTo === "created_at" || $colTo === "updated_at") &&
                    in_array($col = static::$prefix.substr($colTo,0,strlen($colTo)-3), $colsFrom))
                {
                    // special case, created_at maps to created and updated_at to updated
                    $colFrom = $col;
                }
            }
            $result[$colTo] = $colFrom;
        }

        return $result;
    }
};