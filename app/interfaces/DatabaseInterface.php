<?php
namespace app\interfaces;

/**
 *
 * @author stanislavelenin
 *        
 */
interface DatabaseInterface
{

    public function query(string $query);

    public function select(string $query);

    public function insert(string $query);

    public function update(string $query);

    public function delete(string $query);

    public function getLastInsertId();
}

