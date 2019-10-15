<?php

if (!function_exists('SqlWithBinding')) {
    function SqlWithBinding($sql, $bindDataArr)
    {
        foreach ($bindDataArr as $binding) {
            $value = is_numeric($binding) ? $binding : "'" . $binding . "'";
            $sql = preg_replace('/\?/', $value, $sql, 1);
        }
        return $sql;
    } 
    
    # $dpa = Model::first();
    # usage example: SqlWithBinding($dpa->toSql(), $dpa->getBindings());
    # You can not ->paginate() or ->toSql() after Post::all() / Post::get()
}

if (!function_exists('ifTableExist')) {
    function ifTableExist($table)
    {
        // \DB::statement("SHOW TABLES LIKE '{$table}'");
        return \DB::connection('mysql')->getSchemaBuilder()->hasTable($table);
    }
}

if (!function_exists('sqlExecute')) {
    function sqlExecute($sql)
    {
        \DB::statement($sql);
    }    
}

if (!function_exists('dropTable')) {
    function dropTable($table)
    {
        \Schema::dropIfExists($table);
    }    
}

if (!function_exists('emptyTable')) {
    function emptyTable($table)
    {
        \DB::table($table)->truncate();
    }    
}



