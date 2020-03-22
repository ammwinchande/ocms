<?php
/**
 * Perform connection to database
 *
 *
 * based on config params
 */
class Connection
{
    public static function make($config)
    {
        try {
            return new PDO(
                $config['connection'] . ';dbname=' . $config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $exc) {
            die('Cannot connect' . $exc->getMessage());
        }
    }
}
