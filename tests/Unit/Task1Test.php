<?php

namespace Tests\Unit;

use Artemkozychev\Tasks\Task1\Connection;
use Artemkozychev\Tasks\Task1\MySqlOptions;
use Artemkozychev\Tasks\Task1\MySqliteOptions;
use Artemkozychev\Tasks\Task1\PgSqlOptions;
use Tests\TestCase;

class Task1Test extends TestCase
{
    public function test_mysql()
    {
        $connection = new Connection(new MySqlOptions('mysql:host=localhost;port=3306;dbname=test'));
        $this->assertEquals('mysql:host=localhost;port=3306;dbname=test', (string)$connection);
    }

    public function test_sqlite()
    {
        $connection = new Connection(new MySqliteOptions('sqlite::memory:'));
        $this->assertEquals('sqlite::memory:', (string)$connection);
    }

    public function test_pgsql()
    {
        $connection = new Connection(new PgSqlOptions('pgsql:host=localhost;post=5432;dbname=test;user=postgres'));
        $this->assertEquals('pgsql:host=localhost;post=5432;dbname=test;user=postgres', (string)$connection);
    }
}