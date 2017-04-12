<?php

namespace CJ\Database;

/*
*   Database class
*/
class Database implements \Anax\Common\ConfigureInterface, \Anax\Common\AppInjectableInterface
{
use \Anax\Common\ConfigureTrait;
use \Anax\Common\AppInjectableTrait;

private $pdo;


    /**
     * @param array $config details on how to connect.
     *
     * @return void
     **/
    public function connect()
    {

        $config = $this->config;

        try {
            $this->pdo = new \PDO($config["dsn"], $config["login"], $config["password"], $config["options"]);
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        } catch (\Exception $e) {
            // Rethrow to hide connection details, through the original
            // exception to view all connection details.
            //throw $e;
            throw new \PDOException("Could not connect to database, hiding details.");
        }
    }



    /**
     * Do SELECT with optional parameters and return a resultset.
     *
     * @param string $sql   statement to execute
     * @param array  $param to match ? in statement
     *
     * @return array with resultset
     */
    public function executeFetchAll($sql, $param = [])
    {
        $sth = $this->execute($sql, $param);
        $res = $sth->fetchAll();
        if ($res === false) {
            $this->statementException($sth, $sql, $param);
        }
        return $res;
    }



    /**
     * Do INSERT/UPDATE/DELETE with optional parameters.
     *
     * @param string $sql   statement to execute
     * @param array  $param to match ? in statement
     *
     * @return PDOStatement
     */
    public function execute($sql, $param = [])
    {
        $sth = $this->pdo->prepare($sql);
        if (!$sth) {
            $this->statementException($sth, $sql, $param);
        }

        $status = $sth->execute($param);
        if (!$status) {
            $this->statementException($sth, $sql, $param);
        }

        return $sth;
    }



    /**
     * Through exception with detailed message.
     *
     * @param PDOStatement $sth statement with error
     * @param string       $sql     statement to execute
     * @param array        $param   to match ? in statement
     *
     * @return void
     *
     * @throws Exception
     */
    public function statementException($sth, $sql, $param)
    {
        throw new \Exception(
            $sth->errorInfo()[2]
            . "<br><br>SQL:<br><pre>$sql</pre><br>PARAMS:<br><pre>"
            . implode($param, "\n")
            . "</pre>"
        );
    }



    /**
     * Return last insert id from an INSERT.
     *
     * @return void
     */
    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }




    /**
     * Return BOOL if value exists
     *
     * @return void
     */
    public function exists($sql, $param = [])
    {
        $sth = $this->execute($sql, $param);
        $res = $sth->fetchAll();
        if ($res === false) {
            $this->statementException($sth, $sql, $param);
        }
        return count($res) > 0;
    }
}
