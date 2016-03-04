<?php namespace database;

/**
 * @author  Rizart Dokollari
 * @version 6/29/2015
 */
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DbTruncator
{

    public static function truncateByModel($model)
    {
        $table = with($model)->getTable();

        self::truncateByTable($table);
    }

    /**
     * @param $table
     * @throws Exception
     */
    public static function truncateByTable($table)
    {
        switch (env('DB_CONNECTION', 'mysql')) {
            case "mysql":
                DB::statement('SET FOREIGN_KEY_CHECKS=0'); // mysql
                Schema::drop($table);
                DB::statement('SET FOREIGN_KEY_CHECKS=1'); // mysql
                break;
            case "pgsql":
                DB::statement("DROP TABLE $table CASCADE"); // postgresql
                break;
            case "sqlite":
            case "sqlite_testing":
                DB::statement('PRAGMA foreign_keys = OFF;');
                Schema::drop($table);
                DB::statement('PRAGMA foreign_keys = ON;');
                break;
        }
    }
}

