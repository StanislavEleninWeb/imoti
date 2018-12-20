<?php
namespace app\classes\database;

/**
 *
 * @author stanislavelenin
 *        
 */
class Database
{

    private static $instance;

    /**
     */
    private function __construct(string $type)
    {
        switch ($type) {
            case 'PDO':
                self::$instance = new PDODatabase();
                break;

            default:

                break;
        }
    }

    public static function getInstance(string $type)
    {
        if (! isset(self::$instance)) {
            self::$instance = new self($type);
        }
        return self::$instance;
    }

    /**
     */
    function __destruct()
    {
        self::$instance = null;
    }
}

