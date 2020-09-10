<?php

namespace App\Core;

use \ClanCats\Hydrahon\Builder;
use \ClanCats\Hydrahon\Query\Sql\FetchableInterface;

class Database
{
    public static function connect()
    {
        return new \PDO("mysql: host=localhost; dbname=".DB_NAME."; charset=utf8;", DB_USERNAME, DB_PASSWORD, [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4',
        ]);
    }

    public static function buildQuery(\PDO $pdo = null)
    {
        try {
            $pdo = $pdo ?? self::connect();
            $h = new Builder('mysql', function ($query, $queryString, $queryParameters) use ($pdo) {
                $statement = $pdo->prepare($queryString);
                $statement->execute($queryParameters);

                // when the query is fetchable return all results and let hydrahon do the rest
                // (there's no results to be fetched for an update-query for example)
                if ($query instanceof FetchableInterface) {
                    return $statement->fetchAll(\PDO::FETCH_ASSOC);
                }
            });

            return $h;
        } catch (\PDOException $e) {
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }
            throw new \Exception('พบข้อบกพร่องทางเทคนิค รหัส: ' . $e->getCode(), 1, $e);
        }
    }
}
