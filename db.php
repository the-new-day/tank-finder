<?php

/**
 * Class Database. This class is needed for easier working with database
 */
class Database
{
    private \PDO $pdo;

    private \PDOStatement $stmt;

    public function __construct()
    {
        $this->pdo = new \PDO(
            "mysql:dbname=wgfm_cheat;host=127.0.0.1:3306",
            'root',
            '123'
        );
        //$this->pdo->beginTransaction();
    }

    /**
     * Executes custom prepared SQL query
     *
     * @usage print_r($db->execute('SELECT * FROM tbl WHERE id = ?', [$id]));
     * @usage print_r($db->execute('SELECT * FROM tbl WHERE id = :id', [':id' => $id]));
     *
     * @param string $query SQL query string
     * @param array $bindings PDO bindings for SQL query
     * @param int $mode PDO fetch mode. Default PDO::FETCH_ASSOC
     * @return mixed
     * @throws \Exception
     */
    public function execute(string $query, array $bindings = [], $mode = \PDO::FETCH_ASSOC)
    {
        $this->reset();

        $this->stmt = $this->pdo->prepare($query);
        if ($this->stmt->execute($bindings)) {
            return $this->stmt->fetchAll($mode);
        }

        $errInfo = $this->stmt->errorInfo();
        //print_r($this->stmt->debugDumpParams());
        //print_r($bindings);
        throw new \Exception("An error occurred while trying to execute SQL query\nError info: {$errInfo[0]}, {$errInfo[1]}, {$errInfo[2]}");
    }

    /**
     * Returns PDOStatement error info
     * @return array
     */
    public function errorInfo()
    {
        return $this->pdo->errorInfo();
    }

    public function __destruct()
    {
        //$this->pdo->commit();
    }

    private function reset()
    {
        $this->stmt = new \PDOStatement();
    }
}
