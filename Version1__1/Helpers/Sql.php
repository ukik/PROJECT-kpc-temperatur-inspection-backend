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
        // dd("{$table}",\DB::statement("SHOW TABLES LIKE '%{$table}%'"));
        return count(\DB::select("SHOW TABLES LIKE '{$table}'")) <= 0 ? false : true;
        // return \DB::connection('mysql')->getSchemaBuilder()->hasTable($table); // tidak konsisten
    }
}

if (!function_exists('ifViewExist')) {
    function ifViewExist($view)
    {
        // dd("{$table}",\DB::statement("SHOW TABLES LIKE '%{$view}%'"));
        return count(\DB::select("SHOW TABLES LIKE '{$view}'")) <= 0 ? false : true;
        // return \DB::connection('mysql')->getSchemaBuilder()->hasTable($view); // tidak konsisten
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



