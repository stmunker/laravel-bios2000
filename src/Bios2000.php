<?php

namespace Bios2000;

use Bios2000\Models\Database\Adresse;
use Exception;
use Illuminate\Database\Connectors\MySqlConnector;
use Illuminate\Database\Connectors\PostgresConnector;
use Illuminate\Database\Connectors\SQLiteConnector;
use Illuminate\Database\Connectors\SqlServerConnector;
use Illuminate\Support\Facades\DB;
use PDO;

class Bios2000
{
    protected $conn = null;
    private $config = [];

    public function __construct($config)
    {
        $this->config = $config;

        $connector = $this->createConnector($this->config);
        $this->conn = $connector->connect($this->config);
    }

    public function serverinfo()
    {
        return $this->conn->getAttribute(PDO::ATTR_SERVER_INFO);
    }

    public function test()
    {
        return $this->conn->query('SELECT TOP (10) * FROM ADRESSEN')->fetchALL(PDO::FETCH_ASSOC);
    }

    public function adresse()
    {
        return new Adresse;
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