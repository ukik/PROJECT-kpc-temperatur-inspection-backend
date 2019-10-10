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
