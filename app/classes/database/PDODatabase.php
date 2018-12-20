<?php
namespace app\classes\database;

use app\interfaces\DatabaseInterface;

/**
 *
 * @author stanislavelenin
 *        
 */
class PDODatabase implements DatabaseInterface
{

    /**
     * PDO connection object
     *
     * @var object
     */
    private $connection;

    /**
     * PDO statement
     *
     * @var object
     */
    private $stmt;

    /**
     */
    public function __construct()
    {
        $credentials = parse_ini_file(dirname(__DIR__, 3) . '/config/Database.ini');
        $dsn = 'mysql:host=' . $credentials['host'] . ';port=' . $credentials['port'] . ';dbname=' . $credentials['dbname'] . ';charset=utf8';
        $this->connection = new \PDO($dsn, $credentials['username'], $credentials['password'], $credentials['options']);
    }

    /**
     * (non-PHPdoc)
     *
     * @see \app\interfaces\DatabaseInterface::query()
     */
    public function query($query)
    {

        // TODO - Insert your code here
    }

    /**
     * (non-PHPdoc)
     *
     * @see \app\interfaces\DatabaseInterface::select()
     */
    public function select($query)
    {

        // TODO - Insert your code here
    }

    /**
     * (non-PHPdoc)
     *
     * @see \app\interfaces\DatabaseInterface::insert()
     */
    public function insert(string $query)
    {

        // TODO - Insert your code here
    }

    /**
     * (non-PHPdoc)
     *
     * @see \app\interfaces\DatabaseInterface::update()
     */
    public function update($query)
    {

        // TODO - Insert your code here
    }

    /**
     * (non-PHPdoc)
     *
     * @see \app\interfaces\DatabaseInterface::delete()
     */
    public function delete($query)
    {

        // TODO - Insert your code here
    }

    /**
     * (non-PHPdoc)
     *
     * @see \app\interfaces\DatabaseInterface::getLastInsertId()
     */
    public function getLastInsertId()
    {

        // TODO - Insert your code here
    }
}

