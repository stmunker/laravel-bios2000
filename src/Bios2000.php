<?php

namespace Bios2000;

use Exception;
use Illuminate\Database\Connectors\MySqlConnector;
use Illuminate\Database\Connectors\PostgresConnector;
use Illuminate\Database\Connectors\SQLiteConnector;
use Illuminate\Database\Connectors\SqlServerConnector;
use Illuminate\Support\Facades\DB;

class Bios2000
{
    protected $conn = null;
    public $config = [];

    public function __construct($config)
    {
        $this->config = $config;

        $connector = $this->createConnector($this->config);
        $this->conn = $connector->connect($this->config);

        print_r($this->conn->query('SELECT TOP (10) * FROM ADRESSEN')->fetchAll());

    }

    public function createConnector(array $config)
    {
        if (!isset($config['driver'])) {
            throw new Exception('A driver must be specified.');
        }
        switch ($config['driver']) {
            case 'mysql':
                return new MySqlConnector;
            case 'pgsql':
                return new PostgresConnector;
            case 'sqlite':
                return new SQLiteConnector;
            case 'sqlsrv':
                return new SqlServerConnector;
        }
        throw new Exception("Unsupported driver [{$config['driver']}]");
    }
}