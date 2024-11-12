<?php

namespace App\Model;

use PDO;

abstract class Model
{
    private static ?PDO $connection = null;

    protected static function db(): PDO
    {
        if (empty(self::$connection)) {
            self::$connection = new PDO(
                'mysql:host=mysql;dbname=Finance',
                'root',
                'root'
            );

            self::$connection->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );
        }

        return self::$connection;
    }
}