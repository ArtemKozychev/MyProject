<?php

namespace Artemkozychev\Tasks\Task1;

class MySqliteOptions implements ConnectionOptionInterface
{
    protected $connectionString;

    public function __construct($connectionString)
    {
        $this->connectionString = $connectionString;
    }

    public function getDns(): string
    {
        return $this->connectionString;
    }
}